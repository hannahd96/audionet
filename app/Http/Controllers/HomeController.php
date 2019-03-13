<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
//stuff we added in
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
//end of things we added in
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stories = Story::all();
        return view('home')->with([
            'stories' => $stories
        ]);

    // how do we send this into the database when the user accesses the home page  
        //  $process = new Process('C:\Users\hdevl\AppData\Local\Programs\Python\Python37\python C:\xampp\htdocs\songRec.py');
        //  $process = new Process('C:\xampp\htdocs\songRec.py');
         
        //  $process->run();

    // executes after the command finishes
        //   if (!$process->isSuccessful()) {
        //       throw new ProcessFailedException($process);
        //   }
          //jsonResult stores songs
    //      $rec_songs = $process->getOutput();
    //     //    //convert the JSON string in $jsonResult to an array.
    //     //     var_dump(json_decode($rec_songs));
    //     //     var_dump(json_decode($rec_songs, true));
    //     //    json_decode(string ($rec_songs));
    //         dd($rec_songs);      
                
    //     $stories = Story::all();

    //     return view('home')->with([
    //         'stories' => $stories
    //     ], 'rec_songs', json_decode($rec_songs, true));

    //  }

    }
}
