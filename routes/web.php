<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/{name}', function($name) {
    return "Hello $name";
});


Route::get('/', function () {
    return view('welcome');
});


Route::get('/', 'UserController@index');

Route::get('/tweet', 'TweetController@index');

Route::get('/follow', 'FollowController@index');