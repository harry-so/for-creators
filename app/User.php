<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'birth_year', 'birth_month', 'user_desc',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function item() {
        return $this->hasMany('App\Item', 'user_id');
    }

    public function purchase() {
        return $this -> hasMany('App\Purchaser', 'purchaser_id');
    }

    public function bid() {
        return $this->hasMany('App\Bid','user_id');
    }

    public function chats() {
        return $this->hasMany('App\Chats', 'user_id');
    }

    public function fav_items() {
        return $this->belongsToMany('App\Item');
    }

}