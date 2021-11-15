<?php

use Illuminate\Support\Facades\Route;

Route::prefix('blog-module')->name('blog-module.')->group(function (){
    Route::prefix('articles')->name('articles.')->group(function (){
        Route::post('', 'Api\ArticlesController@create')
            ->name('create');
        Route::get('', 'Api\ArticlesController@index')
            ->name('index');
        Route::put('{article}', 'Api\ArticlesController@update')
            ->name('update');
        Route::get('{article}', 'Api\ArticlesController@show')
            ->name('show');
        Route::delete('{article}', 'Api\ArticlesController@delete')
            ->name('delete');
    });
});
