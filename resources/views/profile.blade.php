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

function openCloseDiv() {
  var x = document.getElementById("comment_section");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
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
    <img src="images/hamburger_menu_icon.png" id="hamburger" alt = "hamburger_icon" width="40px" height="40px">
</span>
<div class="main">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
                <img src="uploads/avatars/{{ $user->avatar }}" style = "width:100px; 
                                                                        height:100px; 
                                                                        float:left; 
                                                                        border-radius:50%; 
                                                                        margin-right:25px;">
                <div class ="profile_section">                                                            
                    <h2 style="padding-bottom:10px">{{ $user->name }}'s Profile</h2>
                    <br>
                        <form enctype="multipart/form-data" action="profile" method="POST">
                        <br>
                            <label>Update Profile Image</label>
                            <input type="file" name="avatar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="pull-right btn btn-sm btn-primary" value="Change">
                           
                        </form>
                        <br>
                </div>        
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
            <table class="table">
                 <tbody>
                   <tr>
                     <td>Name</td>
                     <td><b>{{ Auth::user()->name }}</b></td>
                   </tr>
                   <tr>
                     <td>Email</td>
                     <td><b>{{ Auth::user()->email }}</b></td>
                   </tr>
                   <tr>
                     <td>Favourite Artist</td>
                     <td></td>
                   </tr>
                   <tr>
                   <td>Favourite Genre</td>
                     <td></td>
                   </tr>
                   </tr>
                 </tbody>
               </table>  
            </div>
      
        </div>
    </div>
    </div>
</div>
@endsection
