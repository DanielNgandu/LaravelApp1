<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
}
