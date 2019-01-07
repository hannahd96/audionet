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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// if I get a GET request for /songs, execute the the index api method inside the SongController
Route::get('/songs', 'SongController@apiIndex');
Route::get('/songs/{id}', 'SongController@apiShow');
Route::post('/songs', 'SongController@apiStore');
Route::put('/songs/{id}', 'SongController@apiUpdate');
Route::delete('/songs/{id}', 'SongController@apiDelete');
