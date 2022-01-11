<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchaser extends Model
{
    protected $table = 'purchaser';
    
    protected $fillable = [
        'purchaser_id', 'item_id', 'final_price'
    ];

    public function user() {
        return $this -> belongsTo('App\User', 'purchaser_id', 'id');
    }

    public function item() {
        return $this -> belongsTo('App\Item',"item_id");
    }

    public function chats() {
        return $this->hasMany('App\Chats', 'purchaser_id');
    }
}
