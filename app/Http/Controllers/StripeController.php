<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Illuminate\Support\Facades\Session;
use App\Item;
use App\User;
use App\Bid;
use App\Chats;
use App\Purchaser;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function payment ($p_id) {
        
        $purchase = Purchaser::where("id", $p_id)->first();
        // Stripe
        $line_item = [
            'name' => $purchase->item->item_name,
            'description' => $purchase->item->item_desc,
            'amount' => $purchase->final_price,
            'currency' => 'jpy',
            'quantity' => 1,
        ];
        
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $session = \Stripe\Checkout\Session::create([
            // 'payment_method_types' => ['card', ''],
            'line_items' => [$line_item],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => url('transaction/'.$purchase->id),
            // 失敗しました、の表示があったほうがいい?
        ]);

        $publicKey = env('STRIPE_PUBLIC_KEY');

        // Session関数の内容確認
        session()->flush();
        session()->regenerate();
        // Session関数に、P_idとUser_idの照合を行えるように格納
        session(['p_id' => $purchase->id, 'user_id' => auth::id()]);

        return view ('checkout',
            compact('session', 'publicKey'));
    }

    public function success (){
        // セッションと、Auth::ID()から、決済が完了したPurchase情報を抜き取る
        $p_id = session('p_id');
        $user_id = session('user_id');
        if($user_id == Auth::id()) {
            $p = Purchaser::where('id', $p_id)->first();
            $item = Item::find($p->item_id);
            $item->transaction = 4;
            $item->save();

            $p->paid_time = now();
            $p->save();

            Log::info('決済完了をDBに反映しました');
        } else {
            Log::info('決済完了がDBに反映できませんでした。');
        };
        // TransactionページへRedirectする
        return redirect()->action([TransactionsController::class, 'show'], ['p_id' => $p_id]);
        
    }
    
}
