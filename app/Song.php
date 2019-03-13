<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        if ($ratings->count() > 0) {
            $total = 0.0;
            foreach ($ratings as $rating) {
                $total = $total + $rating->rating;
            }
            $result = $total / $ratings->count();
        }
        return $result;
    }
}
