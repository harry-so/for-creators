<?php

namespace App\Http\Controllers;
use App\Item;
use App\Purchaser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;
use App\Mail\ContactMail;

class GeneralController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('created_at', 'desc')->paginate(12);
        $top_sales = Purchaser::orderby('final_price', 'desc')->limit(12)->get();
        // $onsales = Item::where(strtotime("endtime"), ">=", date('Y-m-d H:i:s'))->paginate(4);
        return view('index', [
            'items' => $items,
            'top_sales' => $top_sales,
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

