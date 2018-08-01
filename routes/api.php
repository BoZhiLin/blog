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

Route::group(['middleware' => ['api']], function ($router) {
    Route::get('me', 'api\AuthController@me');
    Route::post('login', 'api\AuthController@login');
    Route::post('logout', 'api\AuthController@logout');
    Route::post('refresh', 'api\AuthController@refresh');
});

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::apiResource('post', 'api\PostController');
});
