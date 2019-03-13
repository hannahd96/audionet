<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\SongRating;
use App\Story;
use App\User;
use Illuminate\Support\Facades\Auth;

class SongRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }


   // recommended songs
   public function yourMusic()
   {
       $songs = Song::all();

       return view('yourMusic')->with(array(
           'songs' => $songs
       ));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $song = Song::findOrFail($id);

        return view('song_ratings.create')->with(array(
            'song' => $song
        ));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $song = Song::findOrFail($id);

        $song_rating = new SongRating();
        $song_rating->user_id = Auth::user()->id;
        $song_rating->song_id = $song->id; 
        $song_rating->rating = $request->input('rating'); 
        $song_rating->save();

       $session = $request->session()->flash('message', 'Rating added successfully!');

       return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}