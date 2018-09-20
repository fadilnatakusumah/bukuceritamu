<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canvas extends Model
{
    //
    protected $fillable = ['book_id', 'json_data', 'canvas_width', 'canvas_height'];
    // public function asset(){
    //     return $this->hasMany('App\Asset');
    // }

    public function book(){
        return $this->belongsTo('App\Book');
    }
}
