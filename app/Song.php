<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    // array of attributes of song
    protected $fillable = ['title', 'artist', 'album', 'genre', 'year'];

    public function stories() {
        return $this->hasMany('App\Story');
    }
}
