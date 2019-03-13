<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Song;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::all();

        return view('songs.index')->with(array(
            'songs' => $songs
        ));
    }

    public function add_story(){

        $songs = Song::all();

        return view('add_story')->with(array(
            'songs' => $songs
        ));
    }

    // // recommended songs
    // public function yourMusic()
    // {
    //     $songs = Song::all();

    //     return view('yourMusic')->with(array(
    //         'songs' => $songs
    //     ));
    // }

}
