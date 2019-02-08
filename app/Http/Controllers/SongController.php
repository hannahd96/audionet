<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Song;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::all();

        return view('songs.index')->with(array(
            'songs' => $songs
        ));
    }

    // recommended songs
    public function yourMusic()
    {
        $rec_songs = Song::all();

        return view('yourMusic')->with(array(
            'songs' => $rec_songs
        ));
    }

}
