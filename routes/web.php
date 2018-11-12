<?php

Auth::routes();

Route::get('', 'ViewControllers\TimelineViewController@index');
Route::get('/', 'ViewControllers\TimelineViewController@index');
Route::post('/', 'ViewControllers\TimelineViewController@post');
Route::post('', 'ViewControllers\TimelineViewController@post');

Route::get('/profile', 'ViewControllers\TopViewController@index');
