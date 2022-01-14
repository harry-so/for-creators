<?php

namespace App\Http\Controllers;
use App\Item;
use App\Purchaser;
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
        $items = Item::orderBy('created_at', 'desc')->simplePaginate(12);
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
}

