<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //create post action here
    public function create(){
        //folder/file
    return view('posts.create');
    }
}
