<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //security guard, leaving this empty ie [], means the model is unguarded
    protected $guarded = [];
    //post belongs to user
    public function user(){
        return $this->belongsTo(User::class);
    }
}
