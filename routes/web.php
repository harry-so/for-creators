<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CredentialsController;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailTest;
use Illuminate\Http\Request;
use App\Item;
use App\Purchaser;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/', function(){
    $items = Item::orderBy('created_at', 'desc')->paginate(12);
    $top_sales = Purchaser::orderby('final_price', 'desc')->limit(12)->get();
        return view('index', [
            'items' => $items,
            'top_sales' => $top_sales,
            // 'fav_items' =>$fav_items
        ]);
});
// Route::get('/', 'ItemsController@index');
Route::get('/discover', [ItemsController::class,'discover'])->name('discover');
Route::get('/auctions',[ItemsController::class,'auction'])->name('auction');
Route::get('/sell', [ItemsController::class,'sell']);
Route::post('/list', [ItemsController::class,'store']);
Route::get('/itemedit/{item}', [ItemsController::class,'edit']);
Route::post('/item/update', [ItemsController::class,'update']);
Route::delete('/itemdelete/{item}', [ItemsController::class,'destroy']);
Route::post('/item/fav/{item_id}',[ItemsController::class,'fav']);
Route::get('/item/{item}', [ItemsController::class,'show']);

// 購入申請周り
Route::get('/purchase/{item}', [TransactionsController::class,'apply']);
Route::post('/purchase/confirm', [TransactionsController::class,'store']);
Route::get('/transaction/{p_id}', [TransactionsController::class,'show']);
Route::delete('/purchase/delete/{bid}', [TransactionsController::class,'destroy']);
Route::get('/purchaseedit/{bid}', [TransactionsController::class,'edit']);
Route::post('/purchase/update', [TransactionsController::class,'update']);
Route::get('/complete/{p_id}', [TransactionsController::class,'complete']);
// 決済
Route::get("/pay/{p_id}", [TransactionsController::class, 'payment']);
Route::get("/success", [TransactionsController::class, 'success'])->name('success');

// ユーザーページ周り
Route::get('/user/{user}', [UsersController::class,'index']);
Route::get('/useredit/{user}', [UsersController::class,'edit']);
Route::post('/user/update', [UsersController::class,'update']);

// チャット
Route::post('/chat', [TransactionsController::class,'chat_send']);


//メール送信フォームを表示
// Route::get('/mail', [MailController::class,'index']);
Route::post('/mail', [MailController::class,'send']);


// //メール送信処理
// Route::post('/mail/send', [MailController::class,'send']);


// コンタクト
Route::get('/contact-us', function(){
    return view('contact-us');
});

Route::get('/activity', function(){
        return view('activity');
});


// Payment
Route::get("/stripe", [StripeController::class, 'get']);
Route::get("/save/{id}", [StripeController::class, 'save_session']);
// Route::post("/stripe", [StripeController::class, 'post'])->name('stripe.post');
// Route::post("/capture", [StripeController::class, 'capture'])->name('capture');

Route::get('/countdown', function(){
    $p = Item::where("id", 5)->first();
    $p1 = Item::where("id", 6)->first();
    $time1 = $p->endtime;
    $time2 = $p1->endtime;

    return view ("countdown", [
        "time1" => $time1,
        "time2" => $time2,
    ]);
});