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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/yourMusic', function () {
    return view('yourMusic');
});

Route::get('/discover', function () {
    return view('discover');
});

Route::get('/add_story', function () {
    return view('add_story');
});

Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

Route::auth();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/songs', 'SongController@index')->name('songs');

// Route::resource('songs', 'SongController');

Auth::routes();