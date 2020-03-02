<?php

use Illuminate\Http\Request;
Use App\Http\Controllers\CommentController;
Use App\Http\Controllers\Auth\RegisterController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user(); // instance of the logged user
});

Route::middleware('auth:api')->get('/user/comments', function (Request $request) {
    $user = $request->user();
    $comments = $user->comments;

    return $comments;
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('comments', 'CommentController@index');
    Route::get('comments/{id}', 'CommentController@show');
    Route::post('comments', 'CommentController@store');
    Route::put('comments/{id}', 'CommentController@update');
    Route::delete('comments/{id}', 'CommentController@delete');
});

//Auth Methods for api
Route::post('register', 'Auth\RegisterController@create');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
