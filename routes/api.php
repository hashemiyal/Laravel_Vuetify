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
Route::post('/user','UsersController@login');
Route::resource('/posts','PostsController');
Route::resource('/users','UsersController');
$request =new Request();
$file=$request->profile;
return response($file);