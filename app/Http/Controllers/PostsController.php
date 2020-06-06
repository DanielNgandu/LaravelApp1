<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class PostsController extends Controller
{
    //constructor
    public function __construct()
    {
        $this->middleware('auth');
    }

    //create post action here
    public function create(){
        //folder/file
    return view('posts.create');
    }

    //store post  here
    public function store(Request $request){
        //folder/file
        $data = request()->validate([
            'text' => 'required|min:5',
            'image' => 'required'
        ], [

            'caption.required' => 'Caption is required',

        ]);

//        dd(request()->all());


        $imageName = 'T'.time().'.'.$request->image->extension();



        $request->image->move(public_path('uploads'), $imageName);



        return back()

            ->with('success','You have successfully upload image.')

            ->with('image',$imageName);

        //dump all
//        dd($path);
        //only create/store data from auth users
        auth()->user()->post()->create($data);
        dd(request()->all());
    }
}
