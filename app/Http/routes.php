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


Route::get('/', ['as' => 'paste.home', 'uses' => 'PasteController@index']);
Route::get('/create', ['as' => 'paste.create', 'uses' => 'PasteController@create']);
Route::get('{paste}', ['as' => 'paste.read', 'uses' => 'PasteController@create']);

Route::post('/store', ['as' => 'paste.store', 'uses' => 'PasteController@store']);


