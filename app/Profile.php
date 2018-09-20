<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = ['username', 'address', 'avatar', 'user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function book(){
        return $this->hasMany('App\Book');
    }
}
