<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPurchaserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaser', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedBigInteger('purchaser_id');
            $table->unsignedBigInteger('item_id');
            $table->integer('final_price');
            $table->foreign('purchaser_id')->references('id')->on('users')->onDelete('cascade'); //外部キー参照
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade'); //外部キー参照
            $table->unique(['purchaser_id', 'item_id'],'uq_roles'); //Laravelは複合主キーが扱いにくいのでユニークで代用
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
        Schema::dropIfExists('users');
        // Schema::dropIfExists('items');
        // Schema::dropIfExists('purchaser');
    }
}
