<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*
Route::get('/', function () {
    return view('userList');
});
*/

Route::get('/', 'UserController@all');
Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@doCreate');

Route::get('/message/{userId}', 'MessageController@inbox');
Route::get('/message/{userId}/sent', 'MessageController@sentMessages');
Route::get('/message/{userId}/new', 'MessageController@new');
Route::post('/message/{userId}/new', 'MessageController@sendNew');
Route::get('/message/{userId}/read/{messageMetaId}', 'MessageController@read');
Route::get('/message/{userId}/sent/{messageMetaId}/read/', 'MessageController@readSent');