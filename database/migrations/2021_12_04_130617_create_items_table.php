<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_name');
            $table->integer('min_price');
            $table->datetime('published');
            $table->integer('user_id');
            $table->integer('sales_method')->default(0);
            $table->string('item_desc');
            $table->string('img_1');
            $table->integer('status')->default(1);
            // 1 = 出品中
            // 2 = ドラフト
            // 6 = 購入者あり
            // 7 = 出品期間終了 / 取引不成立

            $table->integer('transaction')->default(3);
            // 3 = 支払い待ち
            // 4 = 発送待ち
            // 5 = 配送中
            // 6 = 取引完了
            $table->integer('duration');
            $table->dateTime('endtime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
        Schema::dropIfExists('users');
    }
}
