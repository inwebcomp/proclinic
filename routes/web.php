<?php

if (\App::runningUnitTests()) {
    $locale = \App::getLocale();
} else {
    $locale = request()->segment(1);
}

if (strlen($locale) !== 2) {
    $locale = '';
} else {
    request()->merge([
        'locale' => $locale
    ]);
}

Route::group(['prefix' => $locale], function () {
    Route::get('', "PageController@index")->name('index');
    Route::get('service/{service}', 'ServiceController@show')->name('service');
    Route::get('doctor/{doctor}', 'DoctorController@show')->name('doctor');

    Route::group(['prefix' => 'blog', 'as' => 'blog.'], function() {
        Route::get('', 'BlogController@index')->name('index');
        Route::get('{category}', 'BlogController@index')->name('category');
    });

    Route::group(['prefix' => 'article', 'as' => 'article.'], function() {
        Route::get('{article}', 'BlogController@show')->name('show');
    });

    Route::get('{page}', 'PageController@show')->where('page', '^(?!' . config('admin.path') . ')(.)*$')->name('page');
});

if (! function_exists('localized')) {
    function localized($uri, $language = null)
    {
        return \InWeb\Base\Support\Route::localized($uri, $language);
    }
}