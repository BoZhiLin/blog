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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'web\HomeController@index')->name('home');

Route::group(['middleware' => ['auth:web']], function () {
    Route::resource('post', 'web\PostController');
    
    Route::post('post/{id}/comment/store', 'web\CommentController@store')->name('comment.store');        
    Route::delete('comment/{id}', 'web\CommentController@destroy')->name('comment.destroy');
});
