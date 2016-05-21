<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();
Route::get('/', 'HomeController@index');

//Event controller routes
Route::get('/event', 'EventController@index');
Route::get('/event/create', 'EventController@create');
Route::post('/event/create', 'EventController@store');
Route::get('/event/{name}/edit', 'EventController@edit');
