<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Song;
use App\Http\Controllers\Controller;

class SongController extends Controller
{
    public function index()
    {
        return Song::all();
        // code to order table contents from newest to oldest: doens't work
        $song = DB::table('songs')
                ->latest()
                ->first();
    }

    public function show($id)
    {
        // find song with that id - if it doens't exist, throw error
        return Song::findOrFail($id);
    }
}
