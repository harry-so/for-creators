<?php

namespace App\Http\Controllers;
use App\Item;
use App\User;
use App\Bid;
use App\Purchaser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::where("status",1)->orwhere("status",6)->orderBy('created_at', 'desc')->paginate(12);
        
        if(Auth::check()) {
            return view('index', [
                'items' => $items,
            ]);
        }else{
            return view('index', [
                'items' => $items,
            ]);
        }
    }

    public function auction()
    {
        $items = Item::where("status",1)->orwhere("status",6)->orderBy('created_at', 'desc')->paginate(10);
        
        if(Auth::check()) {
            // $fav_items = Auth::user()->fav_items()->get();
            return view('auctions', [
                'items' => $items,
                // 'fav_items' =>$fav_items
            ]);
        }else{
            return view('auctions', [
                'items' => $items,
            ]);
        }
    }

    public function discover()
    {
        $items = Item::orderBy('created_at', 'desc')->paginate(12);
            // $fav_items = Auth::user()->fav_items()->get();
            return view('discover', [
                'items' => $items,
                // 'fav_items' =>$fav_items
            ]);
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
        //バリデーション
        $validator = Validator::make($request->all(), [
        'item_name' => 'required|max:255',
        'min_price' => 'required|max:100',
        'item_desc' => 'required|max:500',
        'img_1' => 'required|file|image|max:2048',
        ]);
        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/')
            ->withErrors($validator)
            ->withInput();
        }

        // // 画像ファイル取得
        $file = $request->img_1;

        //以下に登録処理を記述（Eloquentモデル）
        $items = new Item;

        if ( !empty($file) ) {
            // ファイルの拡張子取得
            $ext = $file->guessExtension();
            //ファイル名を生成
            $fileName = Str::random(32).'.'.$ext;
            // 画像のファイル名を任意のDBに保存
            $items->img_1 = $fileName;
        }
        
        $items->item_name = $request->item_name;
        $items->min_price = $request->min_price;
        $items->user_id = Auth::id();
        $items->item_desc = $request->item_desc;
        $items->published = now();
        $items->duration = $request->duration;

        $basetime = new Carbon($items->published);

        if($request->duration === '1') {
            $items->endtime = $basetime->addHours(1);
        }elseif($request->duration==='2') {
            $items->endtime = $basetime->addDays(1);
        }elseif($request->duration==='3') {
            $items->endtime = $basetime->addDays(3);
        }elseif($request->duration==='5') {
            $items->endtime = $basetime->addMinutes(3);
        }else{
            $items->endtime = $basetime->addWeeks(1);
        }

        $items->save();

        //public/itemsフォルダを作成
        $target_path = public_path('/items/');

        //ファイルをpublic/uploadフォルダに移動
        $file->move($target_path,$fileName);

        return redirect('/');
    }

    public function sell() {
        return view ('create-item');
        // return view ('sell');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  商品ページ
    public function show(Item $item)
    {   

        $your_bid = Bid::where('item_id',$item->id)->where('user_id',Auth::id())->first();
        $bids = Bid::where("item_id", $item->id)->orderby("bid_time")->get();
        $purchase = Purchaser::where("item_id",$item->id)->first();
        $bid_count = Bid::where('item_id',$item->id)->count();
        $top_sellers = Purchaser::orderby('final_price', 'desc')->limit(12)->get();

        if($purchase) {
            $user = User::where("id",$purchase->purchaser_id)->first();
            
            return view('item-details')->with([
                'top_sellers' => $top_sellers,
                'item'=>$item, 
                'bids'=>$bids,
                'your_bid'=>$your_bid,
                'purchase'=>$purchase,
                'user'=>$user,
                'bid_count'=>$bid_count,
            ]);
        } else {
            return view('item-details')->with([
                'top_sellers' => $top_sellers,
                'item'=>$item, 
                'bids'=>$bids,
                'your_bid'=>$your_bid,
                'bid_count'=>$bid_count,
        ]);

        }
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('item-edit',['item'=> $item]);
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
        //バリデーション
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|max:255',
            'min_price' => 'required|max:100',
            'item_desc' => 'required|max:500',
            // 'img_1' => 'required|file|image|max:2048',
        ]);
        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
        // Eloquent モデル
        $items = Item::find($request->id);
        // 画像ファイル取得
        $file = $request->img_1;

        if ( !empty($file) ) {

            // ファイルの拡張子取得
            $ext = $file->guessExtension();

            //ファイル名を生成
            $fileName = Str::random(32).'.'.$ext;

            // 画像のファイル名を任意のDBに保存
            $items->img_1 = $fileName;

            //public/itemsフォルダを作成
            $target_path = public_path('/items/');

            //ファイルをpublic/uploadフォルダに移動
            $file->move($target_path,$fileName);
        }
        $items->item_name = $request->item_name;
        $items->min_price = $request->min_price;
        $items->duration = $request->duration;
        $items->user_id = Auth::id();
        $items->item_desc = $request->item_desc;
        $items->save();


        //古いファイルを消す
        return redirect()->action([ItemsController::class, 'show'], ['item'=> $items]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect('/');
    }
    public function fav($item_id)
    {
        //ログイン中のユーザーを取得
        $user = Auth::user();
        
        //お気に入りする記事
        $item = Item::find($item_id);
        
        //リレーションの登録
        $item->fav_user()->attach($user);
        
        return redirect('/');
    }
}
