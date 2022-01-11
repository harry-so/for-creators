<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bid extends Model
{
    
    use HasFactory;
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function item() {
        return $this->belongsTo('App\Item', 'item_id');
    }
}
