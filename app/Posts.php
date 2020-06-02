<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //post belongs to user
    public function user(){
        return $this->belongsTo(User::class);
    }
}
