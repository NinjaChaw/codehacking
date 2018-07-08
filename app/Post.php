<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [

        'photo_id',
        'category_id',
        'title',
        'body'

    ];


    //Relationship with User
    public function user() {
        return $this->belongsTo('App\User');
    }


    //Relationship with Photo
    public function photo() {
        return $this->belongsTo('App\Photo');
    }


    //Relationship with Category
    public function category() {
        return $this->belongsTo('App\Category');
    }

    //Relationship with Comments table
    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
