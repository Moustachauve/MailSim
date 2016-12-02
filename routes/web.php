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

Route::get('/message/{userId}', 'MessageController@inbox');

Route::get('/message/{userId}/read/{messageMetaId}', 'MessageController@read');