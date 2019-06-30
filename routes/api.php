<?php

Route::post('/consultation', 'FormController@consultation')->name('consultation');
Route::post('/contact', 'FormController@contact')->name('contact');
Route::post('/testimonial', 'FormController@testimonial')->name('testimonial');