<?php

Auth::routes();

Route::get('/', 'ViewControllers\TopViewController@index');


Route::get('/allTweet', 'ViewControllers\allTweetViewController@index');
Route::post('/allTweet', 'ViewControllers\allTweetViewController@post');
