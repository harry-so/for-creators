<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    use HasFactory;
    
    public function user() {
        return $this -> belongsTo('App\User', 'user_id','id');
    }

    public function bid() {
        return $this -> hasMany('App\Bid', 'item_id','id');
    }

    public function purchaser() {
        return $this -> hasOne('App\Purchaser', "item_id");
    }


    public function fav_user() {
        return $this->belongsToMany('App\User');
    }

    public function bid_user() {
        return $this->belongsToMany('App\User');
    }
}
