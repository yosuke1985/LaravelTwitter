<?php

Auth::routes();

Route::get('/', 'ViewControllers\TopViewController@index');
Route::post('/', 'ViewControllers\TopViewController@post');


Route::get('/allTweet', 'ViewControllers\allTweetViewController@index');
Route::post('/allTweet', 'ViewControllers\allTweetViewController@post');
