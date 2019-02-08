@extends('layouts.app')

@section('content')
<head>
  <!--  <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css"> -->
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
  <a href="{{ url('/about') }}">About</a>
  <a href="{{ url('/songs') }}">Discover</a>
  <a href="{{ url('/events') }}">Events Near You</a>
  <a href="{{ url('/yourMusic') }}">Your Music</a>
</div>

<!-- Use any element to open the sidenav -->
<span onclick="openNav()">
    <img src="images/hamburger_menu_icon.png" alt = "hamburger_icon" width="40px" height="40px" style="margin-left:20px; margin-top:70px;">
</span>
<div class="main">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
                <img src="uploads/avatars/{{ $user->avatar }}" style = "width:120px; 
                                                                        height:120px; 
                                                                        float:left; 
                                                                        border-radius:50%; 
                                                                        margin-right:25px;">
                <div class ="profile_section">                                                            
                    <h2 style="padding-bottom:10px">{{ $user->name }}'s Profile</h2>
                        <form enctype="multipart/form-data" action="profile" method="POST">
                            <label>Update Profile Image</label>
                            <input type="file" name="avatar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="pull-right btn btn-sm btn-primary" value="Confirm">
                        </form>
                </div>        
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <hr>
                <!-- <ul class="personal_details">
                    <li id="detail">Name <b>{{ Auth::user()->name }}</b></li>
                    <li id="detail">Favourite Artist</li>
                    <li id="detail">Favourite Genre</li>
                    <li id="detail"></li>
                    <li id="detail"></li>
                    <li id="detail"></li>
                </ul> -->

               <table class="table">
                 <tbody>
                   <tr>
                     <th>Name</th>
                     <th>Favourite Artist</th>
                     <th>Favourite Genre</th>
                   </tr>
                   <tr>
                     <td>{{ Auth::user()->name }}</td>
                     <td></td>
                     <td></td>
                   </tr>
                   </tr>
                 </tbody>
               </table>  
        </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <button class="pull-right btn btn-sm btn-warning" href="#">Edit Details</button>
      </div>
    </div>
</div>
@endsection
