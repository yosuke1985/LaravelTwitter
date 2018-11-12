<?php

Auth::routes();

Route::get('/', 'ViewControllers\TimelineViewController@index');
Route::get('/profile', 'ViewControllers\ProfileTimelineViewController@index');
