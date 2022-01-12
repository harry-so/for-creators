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
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Item::orderBy('created_at', 'desc')->paginate(12);
        $top_sales = Purchaser::orderby('final_price', 'desc')->limit(12)->get();
        // $onsales = Item::where(strtotime("endtime"), ">=", date('Y-m-d H:i:s'))->paginate(4);
        return view('index', [
            'items' => $items,
            'top_sales' => $top_sales,
            // 'onsales' => $onsales,
            // 'fav_items' =>$fav_items
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
}
