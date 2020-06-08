<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//used to show user profile
Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
//edit profile
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
//update patch
Route::patch('/profile/{user}/update', 'ProfileController@update')->name('profile.update');



//used to create a post
Route::get('/post/create', 'PostsController@create');

//used to store post
Route::post('/post', 'PostsController@store');
