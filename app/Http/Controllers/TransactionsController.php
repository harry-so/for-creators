<?php

namespace App\Http\Controllers;
use App\Item;
use App\User;
use App\Bid;
use App\Chats;
use App\Purchaser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\BidCompletedMail;
use Illuminate\Contracts\Mail\Mailable;


class TransactionsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
      }
    
    public function apply (Item $item){
        return view('purchase',['item'=>$item]);
    }
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'max_price' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect ()->back()
                ->withInput()
                ->withErrors($validator);
        }

        $bids = new Bid;
        $bids->user_id = $request->user_id;
        $bids->item_id = $request->item_id;
        $bids->max_price = $request->max_price;
        $bids->message = $request->message;
        $bids->payment = 1;
        $bids->bid_time = now();
        $bids->save();

        $item = Item::find($request->item_id);
        
        // 購入ができたクリエイターへメール
        $details = [
            'item_name' => $item->item_name,
            'creator_name' => $item->user->name,
            'max_price' => $request->max_price,
            'message' => $request->message,
        ];
        
        Mail::to($item->user->email)->send(new BidCompletedMail($details));
        
        return redirect('/item/'.$request->item_id);
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($p_id)
    {
        
        $chats = Chats::where("purchaser_id", $p_id)->orderby('created_at', 'asc')->get();
        $purchase = Purchaser::where("id", $p_id)->first();

        if(Auth::id() == $purchase->purchaser_id || Auth::id() == $purchase->item->user_id ) {
            return view('transaction')->with([
                'purchase' => $purchase, 
                'chats'=> $chats,
            ]);
        } else {
            return redirect('/');
        }

        
    }

    // public function bid($item_id) 
    // {
    //     $validator = Validator::make($request->all(),[
    //         'max_price' => 'required|max:8',
    //         'message' => 'required|max:400',
    //         'payment' => 'required|max:1',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect ()->back()
    //             ->withInput()
    //             ->withErrors($validator);
    //     }
        
    //     $user = Auth:user();
    //     $item = Item::find($item_id);
    //     $item->bid_user()->attach($user);

    //     return redirect('/item/.$item_id');
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bid $bid)
    {
        return view('purchaseedit',['bid'=> $bid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'max_price' => 'required',
            'message' => 'required',
        ]);
        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        // Eloquent モデル
        $bid = Bid::where("id", $request->id)->first();
        
        $bid->max_price = $request->max_price;
        $bid->message = $request->message;
        $bid->item_id = $request->item_id;
        $bid->user_id = $request->user_id;
        $bid->save();

        
        return redirect('/item/'.$request->item_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bid $bid)
    {
        $bid->delete();
        return back();
    }


    // Chats系
    // Chatを送信をしたら、内容をDBにいれて、Redirectして表示をさせる。

    public function chat_send (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'message' => 'required',
            'purchaser_id' => 'required',
        ]);
        
        //バリデーション:エラー 
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with('error', "入力エラーがあります")
                ->withErrors($validator);
        }
        
        $chat = new Chats;
        $chat->purchaser_id = $request->purchaser_id;
        $chat->user_id = $request->user_id;
    
        $chat->message = $request->message;
        $chat->save();

        $user = User::where("id",$request->user_id)->first();
        $item = Item::where("id",$request->item_id)->first();
        // 購入ができたクリエイターへメール
        $details = [
            'user_name' => $user->name,
            'item_name' => $item->item_name,
            'message' => $request->message,
        ];
        
        Mail::to($item->user->email)->send(new ChatMail($details));

        $chats = Chats::where("purchaser_id",$request->purchaser_id)->get();
        $purchaser = Purchaser::where("item_id",$request->item_id)->where("purchaser_id",$request->user_id)->first();

        return redirect()->action([TransactionsController::class, 'show'], ['p_id' => $request->purchaser_id]);
    }

    
    public function complete($p_id)
    {
        
        // Eloquent モデル
        $p = Purchaser::find($p_id);
        $p->completed_time = now();
        $p->save();

        $item = Item::where("id", $p->item_id)->first();
        $item->transaction = 6;
        $item->save();
        
        return redirect()->action([TransactionsController::class, 'show'], ['p_id'=> $p_id]);
    }

    


}
