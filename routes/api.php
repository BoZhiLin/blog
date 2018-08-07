<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'api\UserController@register');

Route::group(['prefix' => 'auth'], function ($router) {
    Route::get('/', 'api\AuthController@me');
    Route::post('login', 'api\AuthController@login');
    Route::post('logout', 'api\AuthController@logout');
    Route::post('refresh', 'api\AuthController@refresh');
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::apiResource('post', 'api\PostController');

    Route::group(['prefix' => 'post'], function () {
        Route::post('{id}/comment/store', 'api\CommentController@store');
    });    
});
