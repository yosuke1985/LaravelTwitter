<?php

Auth::routes();

Route::get('/', 'ViewControllers\TimelineViewController@index');
Route::post('/', 'ViewControllers\TimelineViewController@post');

Route::get('/profile', 'ViewControllers\ProfileViewController@index');
