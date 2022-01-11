<?php

namespace App\Http\Controllers;
namespace App\Mail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail;


class MailController extends Controller
{
    public function index(){

        return view('mail');
    
    }

    public function send(Request $request){

        $email = $request->email; //送信先アドレス取得
        $text = $request->text; //送信テキスト取得
        // dd($text);
    
        // // メール送信処理（//view/emails/test_mail_text.blade.phpにデータを送る）
        // Mail::send(['text' => 'emails.test_mail_text'], [
        //     'text'=>$text , //送りたい情報
        // ]
        // , function($message) use($email) {
    
        //     $message
        //         ->from('info@for-creators.jp')
        //         ->to($email)
        //         // ->bcc('')
        //         ->subject("あなたが好きです。");
        // });
        
        $mailInfo = [
            'body' => $text
        ];


        Mail::to($email)->send(new Mail($mail_text));

        return redirect('mail');
    
        dd("Email is sent.")
    }
}
