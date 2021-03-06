<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

//    /**
//     * Determine if the user is authorized to make this request.
//     *
//     * @return bool
//     */
//    public function authorize()
//    {
//        return true;
//    }

    //
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {

        //find user
        $user = User::findOrFail($id);
//        dd($user->name);
        $user->first()->id;   // id from the first object
       //folder/file
        return view('profile.profile',[
            'user'=>$user
        ]

        );
    }
    public function edit(User $user)
    {
//        $this->authorize('update',$user->profile);
        $profile = Profile::find($user);

        return view('profile.editprofile', compact('user'));
    }
//    public function edit(User $user)
//    {
//     $this->authorize('update',$user->profile);
//
//     return view('profile.editprofile',compact('user'));
//    }
    public function edit1($id)
    {

        //find user
        $user = User::findOrFail($id);
        //Logic start :save the data to the database
        $profile  = $user->profile ;

        $data = request()->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'url' => 'required|min:5',
            'image' => 'required'
        ], [

            'title.required' => 'Title is required',
            'description.required' => 'Description is required',
            'url.required' => 'URL is required'

        ]);
        $profile->title = request('title');
        $profile->description = request('description');
        $profile->url = request('url');

        if(request()->hasFile('image')){
            $imageName = 'T'.time().'.'.request()->image->extension();
            request()->image->move(public_path('uploads'), $imageName);
            $profile->image = $imageName;
            $profile->save();
        };
        //update record
        $profile->save();
        if ($profile->save()) {
            //redirect to new page with success messages
            return redirect('/profile/' . auth()->user()->id)
                ->with('success', 'You have successfully upload image.');
        }
        return with('success', 'You have successfully upload image.');
    }
    public function update(User $user)
    {
       $this->authorize('update',$user->profile());
        //Logic start :save the data to the database
        $profile  = Profile::findorFail($user) ;

        $data = request()->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'url' => 'required|min:5',
            'image' => 'required'
        ], [

            'title.required' => 'Title is required',
            'description.required' => 'Description is required',
            'url.required' => 'URL is required'

        ]);
        $profile->title = request('title');
        $profile->description = request('description');
        $profile->url = request('url');

        if(request('image')){
            $imageName = 'T'.time().'.'.request()->image->extension();
            $imagePath = request('image')->store(('profile'), 'public');
            $image = Image::make(public_path("uploads/{$imagePath}"))->fit(1000,1000);
            $image->save();
        };
        //update record
//        auth()->user()->profile()->update(array_merge($data,['image'=>$imagePath]));   // id from the first object
        $profile->save();


        //redirect to new page with success messages
        return redirect('/profile/'.auth()->user()->id)

            ->with('success','You have successfully upload image.');
    }
}
