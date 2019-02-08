@extends('layouts.app')

@section('content')
<head>
  <!--  <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css"> -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>

  <link href = "css/main.css" rel="stylesheet">
  
  <script type="text/javascript">
    function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    }

    function liked() {
    
    };

    function disliked() {
    
};
  </script>
 </head>    

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="{{ url('/about') }}">About</a>
  <a href="{{ url('/discover') }}">Discover</a>
  <a href="#">Events Near You</a>
  <a href="{{ url('/yourMusic') }}">Your Music</a>
</div>

<span onclick="openNav()">
    <img src="images/hamburger_menu_icon.png" alt = "hamburger_icon" width="40px" height="40px" style="margin-left:20px;">
</span>

<div id="main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="chunky_header">Your Music</h2>
                <div class="description">
                    <p>AudioNet recommends music to you based on what music you like. Listen to the song snippet
                    included in each song and simply like or dislike the song; the system will shape it's recommendations
                    around this. <br>               
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div id="dislike_button" style="float:right; margin-top:160px;">
                  <button class="btn btn-danger" id="dislike_btn" onClick="disliked()">
                    Dislike
                  </button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="song_results" style="text-align:center;">
                    <div class="song_object" style="width:330px; height:400px; display:inline-block; border:1px solid black;">
                      <table class="table" style="text-align:left !important">
                        <tr>
                            <td>Song Title:</td>
                        </tr>
                        <tr>
                            <td>Artist:</td>
                        </tr>
                        <tr>
                            <td>Album:</td>
                        </tr>
                        <tr>
                            <td>Genre:</td>
                        </tr>
                        <tr>
                            <td>Year:</td>
                        </tr>
                       </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
           
                <div class="like_button" style="margin-top:160px;">
                    <button class="btn btn-success" id="like_btn" onClick="liked()">
                        Like
                    </button>
                </div> 
            </div>
        </div>
    </div>
</div>

@endsection