<?php

Auth::routes();

Route::get('/', 'ViewControllers\TopViewController@index');

Route::get('/timeline', 'ViewControllers\TimelineViewController@index');
Route::post('/timeline', 'ViewControllers\TimelineViewController@post');
