<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
         'title', 'body', 'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');

    }

    //posts table in database
    protected $guarded = [];
    public function comments()
    {
        return $this->hasMany('App\Comments','on_post');
    }

}
