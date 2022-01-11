<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    public function get(){
        return view ('stripe');
    }

    public function post(Request $request) {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\PaymentIntent::create ([
            "amount" => 5000,
            "currency" => "jpy",
            "payment_method_types" => ['card',],
            "capture_method" => 'manual',
            // "source" => $request->stripeToken,
            "description" => "Harry's Test" 
        ]);

        Session::flash('success', 'Payment successful!');
      
        return back();
    }

    public function capture(Request $request) {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $intent = \Stripe\PaymentIntent::retrieve('pi_3KGMQNDkcqEFc1Gb3PHhU026');
        $intent->capture(['amount_to_capture'=> 5000]);
      
        return back();
    }
    
}
