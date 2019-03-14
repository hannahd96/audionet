<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Song extends Model
{
    public static function top($num) {
        return Song::all()->sortByDesc(function($song, $index) {
            return $song->averageRating();
        })->take($num);
    }

    // array of attributes of song
    protected $fillable = ['title', 'artist', 'album', 'genre', 'year'];

    public function stories() {
        return $this->hasMany('App\Story');
    }
    public function songs(){
        return $this->hasMany('App\Song');
    }

    public function ratings() {
        return $this->hasMany('App\SongRating');
    }

    public function getSongListAttribute() {
        return collect(explode('|', $this->songs));
    }

    public function averageRating() {
        $result = 5.0;
        $ratings = $this->ratings;
        // if there are more than 0 ratings for a song..
        if ($ratings->count() > 0) {
            $total = 0.0;
            // total is equal to 0.0 + rating for the song
            foreach ($ratings as $rating) {
                $total = $total + $rating->rating;
            }
            // result is equal to 0.0 / number of ratings for a song
            $result = $total / $ratings->count();
        }
        // return the result (i.e. avg)
        return $result;
    }
    // recommends 5 random songs, changes every time page refreshes
    public static function recommended(){
        return Song::inRandomOrder()->take(5)->get();
    }


    public static function popMusic($num) {
        
        return Song::where('genre', '=', 'Pop')->take(5)->get();

        // $rec_songs = DB::table('songs')->where('genre', 'Pop')->first();
        // echo $rec_songs->title;
    }

    public static function electronicMusic(){

        return Song::where('genre', '=', 'Electronic')->take(5)->get();

    }
        
}