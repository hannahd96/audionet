@extends('layouts.app')

@section('content')
<head>
  <!--  <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css"> -->
  <link href="https://fonts.googleapis.com/css?family=Exo|Julius+Sans+One|Questrial|Varela" rel="stylesheet">
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
  <a href="{{ url('/home') }}">Home</a>
  <a href="{{ url('/about') }}">About</a>
  <a href="{{ url('/songs') }}">Discover</a>
  <a href="{{ url('/events') }}">Events Near You</a>
  <a href="{{ url('/yourMusic') }}">Your Music</a>
  
<br><br><br>
<hr>

<a href="{{ route('logout') }}"
   onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</div>

<!-- Use any element to open the sidenav -->
<span onclick="openNav()">
    <img src="images/hamburger_menu_icon.png" id = "hamburger" alt = "hamburger_icon">
</span>

<!-- Add all page content inside this div if you want the side nav to push page content to the right -->
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
                   The recommender system is built using Python and inherits from Python libraries SckitLearn and Pandas.
                </p>
                
            <h2 class="chunky_header">Contact Us</h2>
                <b>Phone: </b> <p>0851234567</p>
                <b>Email: </b> <p>help@audionet.com</p>
        </div>
    </div>
</div>
</div>
@endsection
