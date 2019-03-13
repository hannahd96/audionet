<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'avatar', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
    
    public function stories() {
        return $this->hasMany('App\Story');
    }

    public function songs(){
        return $this->hasMany('App\Song');
    }

    public function ratings() {
        return $this->hasMany('App\SongRating');
    }

    // public static function recommended(){
    //     return $this->otherSongs()->sortByDesc(function ($m) { return $m->ratings(); })->take(8);
    // }

    // public function songObjects(){
    //     $mySongs = collect([]);
    //     foreach ($this->ratings as $rating) {
    //         foreach ($rating->songs as $song) {
    //             if (!Song::inCollection($song, $mySongs)) {
    //                 $mySongs->push($song);
    //             }
    //         }
    //     }
    //     return $mySongs;
    // }
  
    // public function similarUsers() {
    //     $similarUsers = collect([]);
    //     foreach ($this->songs() as $song) {
    //         $ratings = $song->raitngs;
    //         foreach ($songs as $song) {
    //             $user = $rating->user;
    //             if ($user->id != $this->id) {
    //                 if ($similarUsers->first(function($c) use ($user) { return $c->id == $user->id; }) == null) {
    //                     $similarUsers->push($user);
    //                 }
    //             }
    //         }
    //     }
    //     return $similarUsers;
    // }
  
    // public function otherSongs() {
    //      $mySongs = $this->movies();
    //      $otherSongs = collect([]);
    //      foreach ($this->similarUsers() as $user) {
    //          $ratings = $user->ratings;
    //          foreach ($ratings as $rating) {
    //              $song = $rating->songs;
    //              foreach ($songs as $song) {
    //                  if (!Song::inCollection($song, $mySongs) && !Song::inCollection($song, $otherSongs)) {
    //                      $otherSongs->push($song);
    //                  }
    //              }
    //          }
    //      }
    //      return $otherSongs;
    // }
}
