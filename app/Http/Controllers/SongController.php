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
		/* THIS RETREIVES ALL THE SONGS IN THE DB AND GIVES IT BACK AS A COLLECTION OBJECT*/
		$songs = Song::all();
		
		return view('songs.index')->with(array(
		'songs' => $songs
		));
    }

	public function songs_for_you()
    {
			
		return view('songs_for_you');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:191',
            'artist' => 'required|max:191',
			'album' => 'required|max:191',
            'genre' => 'required|max:191',
            'year' => 'required|integer|min:1900'
		]);
		
		/* IF VALIDATION SUCCEEDS, THIS IS EXECUTED.. */
		/* ALL INFO FROM THE REQUEST IS COPIED INTO THE NEW SONG OBJECT BELOW */
		$song = new Song();
		$song->title = $request->input('title');
		$song->artist = $request->input('artist');
		$song->album = $request->input('album');
		$song->genre = $request->input('genre');
		$song->year = $request->input('year');
		$song->save(); /* SAVES IT TO THE DATABASE */
		
		/* NOTIFIES USER THAT SONG WAS ADDED TO DB */
		$session = $request->session()->flash('message', 'Song added successfully!');
		
		/* USER IS REDIRECTED BACK TO THE INDEX PAGE */
		return redirect()->route('songs.index');
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		/* GENERATES AN ERROR IF IT CANT FIND A SONG WITH THE ID */
		/* IF IT DOES FIND A SONG WITH THE ID, THEN IT RETURNS THAT SONG */
         $song = Song::findOrFail($id);
		 
		 return view('songs.show')->with(array(
			'song' => $song
		));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $song = Song::findOrFail($id);
		 
		 return view('songs.edit')->with(array(
			'song' => $song
		));
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
		/* RETREIVE SONG WE ARE UPDATING */
		$song = Song::findOrFail($id);
		
		/* RUN ALL VALIDATION CHECKS */
        $request->validate([
            'title' => 'required|max:191',
            'artist' => 'required|max:191',
			'album' => 'required|max:191',
            'genre' => 'required|max:191',
            'year' => 'required|integer|min:1900'
		]);
		
		/* IF VALIDATION SUCCEEDS, THIS IS EXECUTED.. */
		/* ALL INFO FROM THE REQUEST IS COPIED INTO THE UPDATED SONG OBJECT BELOW */
	
		$song->title = $request->input('title');
		$song->artist = $request->input('artist');
		$song->album = $request->input('album');
		$song->genre = $request->input('genre');
		$song->year = $request->input('year');
		$song->save(); /* SAVES IT TO THE DATABASE */
		
		/* NOTIFIES USER THAT SONG WAS UPDATED TO DB */
		$session = $request->session()->flash('message', 'Song updated successfully!');
		
		/* USER IS REDIRECTED BACK TO THE INDEX PAGE */
		return redirect()->route('songs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		/* GET ID OF SONG WE WANT TO DELETE */
        $song = Song::findOrFail($id);
		
		$song->delete();
		
		Session::flash('message', 'Song deleted successfully!');
		
		return redirect()->route('songs.index');
    }
	
	public function apiIndex() {
		// DATA IS EQUAL TO ALL THE SONGS STORED IN THE DB
		$data = Song::all();
		$status = 200;
		// response array returns a status code and the song(s) 
		$response = array(
			'status' => $status,
			'data' => $data
		);
		
		return response()->json($response);
	}
	
	public function apiShow($id){
		
       // finds the song with that id, so now $song is equal to that song
		$song = Song::find($id);
		// if the song with that id doesn't exist, $song is equal to nothing
		if ($song === null) {
			$status = 404;
			$data = null;
		}
		else {
			$status = 200;
			// $data is equal to $song which contains the song of that id that the user is looking for
			$data = $song;
		}
		$response = array (
			'status' => $status,
			'data' => $data
		);
		
		// converts reponse into a json object which converts it into a string
		return response()->json($response);
	}
	
	// Post Request
	public function apiStore(Request $request){
		// $content is a ref to the json string (has details of all the infor on our form)
		$content = $request->getContent();
		// that is decoded to give us a PHP array. That array is merged into the request array
		$request->merge((array)json_decode($content));
		// VALIDATION
		$rules = [
		    'title' => 'required|max:191',
            'artist' => 'required|max:191',
			'album' => 'required|max:191',
            'genre' => 'required|max:191',
            'year' => 'required|integer|min:1900'	
		];
		// make a validator object, pass in input values from the request and then give it a ref to all the rules
		$validation = Validator::make($request->all(), $rules);
		
		// this gives back a true or false - true of validation fails, false otherwise
		if ($validation->fails()) {
			$data = $validation->getMessageBag();
			$status = 422;
		}
		else {
			// CREATES A NEW SONG OBJECT
			$song = new Song();
			$song->title = $request->input('title');
            $song->artist = $request->input('artist');
            $song->album = $request->input('album');
            $song->genre = $request->input('genre');
            $song->year = $request->input('year');
            $song->save(); /* SAVES IT TO THE DATABASE */
            
			$data = $song;
			$status = 200;		
		}
		
			$response = array(
				'status' => $status,
				'data' =>$data
			);
			
			return response()->json($response);
			// header("Refresh:0; url=songlibrary/public/songs");
	}
	
	public function apiUpdate(Request $request){
		// FIND SONG WITH THE ID WE WANT TO UPDATE
		$song = Song::find($id);
		if (song === null){
			$data = null;
			$status = 404;
		}else {
			$content = $request->getContent();
			$request->merge((array)json_decode($content));
			// VALIDATION
			$rules = [
                'title' => 'required|max:191',
                'artist' => 'required|max:191',
                'album' => 'required|max:191',
                'genre' => 'required|max:191',
                'year' => 'required|integer|min:1900'	
			];
			// make a validator object, pass in input values from the request and then give it a ref to all the rules
			$validation = Validator::make($request->all(), $rules);
			
			// IF THERE ARE ANY ERRORS, RETURN THE ERROR ARRAY AND A STATUS CODE
			if ($validation->fails()) {
				$data = $validation->getMessageBag();
				$status = 422;
			}
			else {
				// OTHERWISE, SAVE THE SONG OBJECT INTO THE DB
                $song->title = $request->input('title');
                $song->artist = $request->input('artist');
                $song->album = $request->input('album');
                $song->genre = $request->input('genre');
                $song->year = $request->input('year');
                $song->save(); /* SAVES IT TO THE DATABASE */
				
				$data = $song;
				$status = 200;
			}
		}
			// RETURNS A RESPONSE TO THE REST API
			$response = array(
				'status' => $status,
				'data' => $data
			);
			return response()->json($response);
	}
	
	public function apiDelete(Request $request, $id){
		// FINDS THE SONG WITH THE ID WE WANT TO DELETE
		$song = Song::find($id);
		// IF THAT SONG DOESN;T EXIST, RETURN A 400 STATUS CODE
		if($song === null){
			$data = null;
			$status = 400;
		}
		// OTHERWISE, DELETE THE SONG. DATA THEREFORE HAS NOTHING IN IT NOW.
		else{
			$song->delete();
			$data = null;
			$status = 200;
		}
		$response = array(
			'status' => $status,
			'data' => $data
		);
		return response()->json($response);
	}
}