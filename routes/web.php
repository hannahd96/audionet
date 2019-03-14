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

use App\Song;

Route::get('/', function () {

    $songs = Song::all();

    return view('welcome')->with(array(
        'songs' => $songs
    ));
});

Route::get('/about', function () {
    return view('about');
});

// Route::get('/yourMusic', function () {
//     return view('yourMusic');
// });

Route::get('/discover', function () {
    return view('discover');
});

Route::get('/add_story', function () {
    return view('add_story');
});

Route::get('/events', function () {
    return view('events');
});

Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

Route::auth();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/songs', 'SongController@index')->name('songs');
Route::get('/yourMusic', 'SongRatingController@yourMusic')->name('yourMusic');
Route::get('songs.show', 'SongController@show')->name('songs.show');

// user stories
// Route::get('/add_story', 'SongController@add_story')->name('songs');

Route::resource('stories', 'StoryController');
Route::get('songs/{id}/ratings/create', 'SongRatingController@create')->name('song_ratings.create');
Route::post('songs/{id}/ratings', 'SongRatingController@store')->name('song_ratings.store');

Auth::routes();