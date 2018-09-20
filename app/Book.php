<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['profile_id', 'title', 'slug', 'canvas', 'finished', 'approved','denied','explanation'];

    public function canvas(){
        return $this->hasMany('App\Canvas');
    }

    public function profile(){
        return $this->belongsTo('App\Profile');
    }
}
