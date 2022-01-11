<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('purchaser_id');
            $table->integer('user_id');
            $table->string('message');
            // $table->foreign('purchaser_id')->references('id')->on('purchaser')->onDelete('cascade'); //外部キー参照
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //外部キー参照
            // $table->unique(['purchaser_id', 'user_id'],'uq_roles'); //Laravelは複合主キーが扱いにくいのでユニークで代用
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
        Schema::dropIfExists('chats');
    }
}
