<?php

Route::get('{locale?}', "PageController@index")->name('index');
Route::get('{locale?}/service', 'PageController@service')->name('service');
Route::get('{locale?}/doctor', 'PageController@doctor')->name('doctor');
Route::get('{locale?}/blog', 'PageController@blog')->name('blog');
