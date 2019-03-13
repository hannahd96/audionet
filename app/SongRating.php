<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SongRating extends Model
{
    
    // array of attributes of song
    // protected $fillable = ['user_id', 'song_id', 'rating'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function song() {
        return $this->belongsTo('App\Song');
    }
}