<?php

Route::get('/', 'ServiceController@index');
Route::get('/service', 'ServiceController@service');
Route::get('/doctor', 'ServiceController@doctor');
Route::get('/blog', 'ServiceController@blog');
