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


//Route::get('/{name}', function($name) {
//    return "Hello $name";
//});
//
//
//Route::get('/', function () {
//    return view('welcome');
//});


//Route::get('/', 'RegisterViewController@index');
Route::get('/register', 'ViewControllers\RegisterViewController@index');
Route::get('/login', 'ViewControllers\LoginViewController@index');
Route::get('/timeline', 'ViewControllers\TimelineViewController@index');
Route::get('/profileTimeline', 'ViewControllers\ProfileTimelineViewController@index');

Route::post('/register', 'ViewControllers\RegisterViewController@post');




