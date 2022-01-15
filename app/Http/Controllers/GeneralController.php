<?php

namespace App\Http\Controllers;
use App\Item;
use App\Purchaser;
use App\Subscriber;
use App\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Pagination\Paginator;
use Illuminate\Contracts\Mail\Mailable;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    public function index()
    {
        $items = Item::where("status",1)->orderBy('created_at', 'desc')->SimplePaginate(12);
        $top_sellers = Purchaser::orderby('final_price', 'desc')->limit(12)->get();
        // $onsales = Item::where(strtotime("endtime"), ">=", date('Y-m-d H:i:s'))->paginate(4);
        $top_supporters = DB::table('purchaser')
            ->join('users', 'purchaser_id', '=', 'users.id')
            ->select('users.*', 'purchaser_id', DB::raw('SUM(final_price) AS sum'))
            ->groupby('purchaser_id')
            ->orderby('sum', "desc")->limit(12)->get();
        return view('index', [
            'items' => $items,
            'top_sellers' => $top_sellers,
            'top_supporters' => $top_supporters,
        ]);
    }
    public function contact()
    {
        return view('contact-us');
    }

    public function inquiry(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        
        Mail::to($request->email)
        ->bcc('tst730_intelath_hiro@outlook.jp')
        ->send(new ContactMail($details));

        return redirect('contact-us');

    }

    public function newsletter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return redirect('/')
            ->withErrors($validator)
            ->withInput();
        }

        if (Subscriber::where('email',$request->email)->exists()) {
            return redirect('/');
        } else {
            $subscriber = new Subscriber;
            $subscriber->email = $request->email;
            $subscriber->user_id = $request->user_id;
            $subscriber->save();
            
            return redirect('/');
        }

        
    }
}

