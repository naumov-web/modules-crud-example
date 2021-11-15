<?php

use Illuminate\Support\Facades\Route;

Route::prefix('blog-module')->name('blog-module.')->group(function (){
    Route::prefix('articles')->name('articles.')->group(function (){
        Route::post('', 'Api\ArticlesController@create');
        Route::get('', 'Api\ArticlesController@index');
    });
});
