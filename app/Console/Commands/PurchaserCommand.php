<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail; 
use App\Mail\LostMail;
use App\Mail\SoldMail;
use App\Mail\UnsoldMail;
use App\Mail\WonMail;
use App\Item;
use App\Bid;
use App\User;
use App\Purchaser;


class PurchaserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'whotobuy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Decide who can buy the item and what price';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // 商品の出品中 && 終了時間が過ぎている Itemを探す
        if (Item::where("status",1)->where("endtime","<",date('Y-m-d H:i:s'))->exists()) {
            Log::info('item exists');
            // Sales_method = 0 (2nd Auction)
            $target_items = Item::where("sales_method","0")->where("endtime","<",date('Y-m-d H:i:s'))->where("status",1)->get();
            // Bidの有無を確認する
            foreach($target_items as $item) {
                $itemid = $item->id;
                Log::info("item_id:".$itemid);
                if(Purchaser::where("item_id",$itemid)->exists()) {
                    Log::info("購入者既にあり");
                    $item->status = 6;
                    $item ->save();
                }else{    
                    if(Bid::where("item_id", $itemid)->exists()) {
                        Log::info("bidあり");
                        // Bidがある && -> Bidの最高値 < Item Min_price -> 取引不成立, Item Statusを7に変更
                        // そのアイテムに入ったBidのうち、最大価格をつけたBidを抽出
                        $high_bid = Bid::where("item_id",$itemid)
                            ->orderby("max_price","desc")
                            ->first();
                        // 最大価格と最小価格を比較
                        $high = $high_bid->max_price;

                        if($item->min_price >= $high) {
                            $item->status = 7;
                            Log::info("最小価格より少ないため不成立");
                            $item->save();
                            // 不成立のメールを送る
                            $bid_count = Bid::where("item_id",$itemid)->get()->count();
                            $details = [
                                'item_name' => $item->name,
                                'bid_count' => $bid_count
                            ];
                            $email = $item->user->email;
                            
                            Mail::to($email)->send(new UnsoldMail($details));


                        }else{
                            // Bidの最高値 >= Item Min_price -> Item Statusを6に更新
                            $item->status = 6;
                            $item->save();
                            // $purchaser_id = 1位の人
                            $purchaser_id = $high_bid->user_id;

                            // min_priceよりも大きいBidder_count = 1 -> $Final_price = Max_priceとMin_priceの間の額, 
                            $min = $item->min_price;
                            $valid_bidder_count = Bid::where("item_id",$itemid)->where("max_price",">=",$min)->get()->count();
                            
                            if($valid_bidder_count == 1) {
                                $max = $high_bid -> max_price;
                                $final_price = ($max - $min)/2 + $min;
                                Log::info("1人のValid Bidder獲得");
                            } 
                            // min_priceよりも大きいBidder_count >= 2 -> $Final_price = 2位のmax_price, $purchaser_id = 1位の人
                            elseif ($valid_bidder_count >= 1) {
                                // 2位の人のレコードを取得
                                Log::info("2人以上のValid Bidder獲得");
                                $second_bidder = Bid::where("item_id",$itemid)->orderby("max_price","desc")->skip(1)->first();
                                $final_price = $second_bidder->max_price;
                                
                            }else {
                                //最低価格以上のBidderが集まらなかった
                                $bid_count = Bid::where("item_id",$itemid)->get()->count();
                                
                                $details = [
                                    'item_name' => $item->item_name,
                                    'bid_count' => $bid_count
                                ];
                                $email = $item->user->email;
                                
                                Mail::to($email)->send(new UnsoldMail($details));

                                };
                            };
                            // item_purchaser DBに登録
                            
                            $purchaser = new Purchaser;
                            $purchaser->purchaser_id = $purchaser_id;
                            $purchaser->item_id = $item->id;
                            $purchaser->final_price = $final_price;
                            $purchaser->created_at = now();
                            $purchaser->save();
                            Log::info("購買者のDB登録完了");
                            Log::info("===============");

                            $winner = User::where('id',$purchaser_id)->first();
                            // 売れたクリエイターへのメール
                            $details = [
                                'item_name' => $item->item_name,
                                'user_name' => $winner->name,
                                'min_price' => $item->min_price,
                                'final_price' => $final_price,
                            ];
                            $email = $item->user->email;
                            
                            Mail::to($email)->send(new SoldMail($details));

                            // 購入ができたクリエイターへメール
                            $details = [
                                'item_name' => $item->item_name,
                                'creator_name' => $winner->name,
                                'max_price' => $high_bid->max_price,
                                'final_price' => $final_price,
                            ];
                            $email = $item->user->email;
                            
                            Mail::to($email)->send(new WonMail($details));

                            // 選ばれなかった人（Losers）へのメール→QUEUEとJOBの実装を待つ

                    
                    } else {

                        Log::info("bidなし");
                        // Bidがない -> Item Statusを7に変更
                        $item->status = 7;
                        $item->save();

                        $details = [
                            'item_name' => $item->item_name,
                            'bid_count' => 0
                        ];
                        $email = $item->user->email;
                        
                        Mail::to($email)->send(new UnsoldMail($details));

                    };
                };
            };

        } else {
            Log::info("item doesn't exist");
        };
    }
}
