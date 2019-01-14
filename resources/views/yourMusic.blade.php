@extends('layouts.app')

@section('content')
<head>
  <!--  <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css"> -->
  <link href = "css/main.css" rel="stylesheet">
  <script>
    function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    }
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
                <p>AudioNet recommends music to you based on what songs you post to your story. After you post a story,
                a new song(s) will appear here and will include a 30 second snippet of the song(s). <br>               
            </div>
            <div class="song_results">
                <!-- SAMPLE INTERFACE OF SONG RESULTS -->
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Song</th>
                    <th scope="col">Artist</th>
                    <th scope="col">Album</th>
                    <th scope="col">Year Released</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Justin Bieber</td>
                        <td>Sorry</td>
                        <td>Purpose</td>
                        <td>2015</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                        <td>Selena Gomez</td>
                        <td>It Ain't Me</td>
                        <td>Stargazing</td>
                        <td>2017</td>
                    </tr>
                  </tbody>
                </table>
            </div>
            <!-- END OF SAMPLE INTERFACE -->
                <p class="description">
                AudioNet is determined to recommending music that you like and will continue to listen to, 
                therefore we appreciate any feedback given to us. 
                Feel free to share your thoughts by contacting us through <a href = "{{ url('about') }}"> our email.</a>
                </p>
            </div>
        </div>
    </div>
</div>
<footer style="padding:20px;">
    AudioNet 2018 &copy
</footer>
@endsection
