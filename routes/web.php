<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
Route::group( [ 'middleware' => 'auth' ], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::post('/posts','PostController@store')->name('post.store');
    Route::get('/post/index','PostController@index')->name('post.index');
    Route::delete('/post/{id}','PostController@destroy')->name('post.delete');
    Route::get('/post/{id}','PostController@edit')->name('post.edit');
    Route::patch('/post/{id}','PostController@update')->name('post.update');
});

Auth::routes();
