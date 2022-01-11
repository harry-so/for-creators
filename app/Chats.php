<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chats extends Model
{
    protected $fillable = [
        'purchaser_id', 'user_id', 'message'
    ];

    public function purchaser() {
        return $this -> belongsTo('App\Purchaser', 'purchaser_id', 'id');
    }

    public function user() {
        return $this -> belongsTo('App\User', 'user_id', 'id');
    }
}
