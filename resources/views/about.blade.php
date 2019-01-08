@extends('layouts.app')

@section('content')
<head>
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
  <a href="{{ route('about') }}">About</a>
  <a href="#">Services</a>
  <a href="#">Contact</a>
</div>

<span onclick="openNav()">
    <img src="images/hamburger_menu_icon.png" alt = "hamburger_icon" width="40px" height="40px" style="margin-left:20px;">
</span>

<div id="main">
<div class="row">
    <div class="col-md-12">
        <div class="user_stories">
            <div class = "user_story_item">
                <img src="uploads/avatars/{{ Auth::user()->avatar }}" style="height:75px; width:75px; border-radius:50%">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          
                
         
        </div>
    </div>
</div>
</div>
<footer style="padding:20px;">
    AudioNet 2018 &copy
</footer>
@endsection
