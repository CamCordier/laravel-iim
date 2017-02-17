<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable = ['name', 'email', 'message', 'user_id',];

    public function user() {
        return $this->belongsTo('App\User');
    }
}