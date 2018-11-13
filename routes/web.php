<?php

Auth::routes();

Route::get('/', 'ViewControllers\TopViewController@index');
Route::post('/', 'ViewControllers\TopViewController@post');


Route::get('/AllTweet', 'ViewControllers\AllTweetViewController@index');
Route::post('/AllTweet', 'ViewControllers\AllTweetViewController@post');



Route::get('/social', 'ViewControllers\SocialViewController@index');
