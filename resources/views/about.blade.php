@extends('layouts.app')

@section('content')
<head>
  <!--  <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css"> -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
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

<!-- Use any element to open the sidenav -->
<span onclick="openNav()">
    <img src="images/hamburger_menu_icon.png" alt = "hamburger_icon" width="40px" height="40px" style="margin-left:20px;">
</span>

<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main">
<div class="row">
    <div class="col-md-12">
      <!---->
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h2 class="chunky_header">About Us</h2>
                <p> AudioNet is a web app that allows you to share your music taste with friends. 
                You can post your own story and see what your friends are listening to by viewing their stories. AudioNet also recommends
                music to you based on what you post to your story. AudioNet also keeps you up to date with what music events are on near 
                you so you know when your favourite artist is performing in your city, you'll know.
                <br><br>
                Your Music, Your Network.
                </p>
           
        </div>
        <div class="col-md-3">
            <h2 class="chunky_header">Technology</h2>
                <p id="about_para_one">AudioNet is built using a PHP framework called Laravel and front-end framework, Bootstrap. 
                   It utilises the Spotify Web API which incorporates Node.js, an open-source JS environment.
                   The recommender system is built using Python and inherits from Python libraries SckitLearn and Pandas.
                </p>
                
            <h2 class="chunky_header">Contact Us</h2>
                <p id="about_para_two">Contact our customer service for help to any questions you have.</p>
                <b>Phone: </b> <p>0851234567</p>
                <b>Email: </b> <p>help@audionet.com</p>
        </div>
    </div>
</div>
</div>
@endsection
