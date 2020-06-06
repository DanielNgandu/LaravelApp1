<?php

namespace App\Http\Controllers;

use App\Posts;
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

        //image upload logic here

        //save the data to the database
        $post  = new Posts() ;
        $post->text = $request->text;
        $post->user_id = auth()->user()->id;

        if($request->hasFile('image')){
//            $image = $request->file('image');
            $imageName = 'T'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $post->image = $imageName;
            $post->save();
        };

        $post->save();


        //only create/store data from auth users
//        auth()->user()->post()->create($data);
        //redirect to new page with success messages
        return redirect('/profile/'.auth()->user()->id)

            ->with('success','You have successfully upload image.')

            ->with('image',$imageName);

//        dd(request()->all());
    }
}
