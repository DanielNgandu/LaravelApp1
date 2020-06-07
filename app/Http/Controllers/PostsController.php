<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Intervention\Image\Facades\Image;

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


        //Logic start :save the data to the database
        $post  = new Posts() ;
        $post->text = $request->text;
        $post->user_id = auth()->user()->id;

        //check if request params have image
        //image upload logic here
//        $image = Image::make(public_path('uploads')->fit(800,800));
        if($request->hasFile('image')){
            $imageName = 'T'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $post->image = $imageName;
            $post->save();
        };

        //Logic end: save request params to our object
        $post->save();


        //redirect to new page with success messages
        return redirect('/profile/'.auth()->user()->id)

            ->with('success','You have successfully upload image.')

            ->with('image',$imageName);

//        dd(request()->all());
    }
}