@extends('layouts.app')

@section('content')
<head>
<style>
*{
   font-family: 'Varela', sans-serif;
    line-height: 1.5;
    font-weight: 400;
}
body{
    background-color: #ffffff;
}

#top-row{
  margin-top:120px;
}

nav{
  height:111px;
}

.navbar-laravel{
  padding:10px !important;
  background-color: rgb(35,35,35,0.8);
  color:white !important;
}

.navbar-brand{
  padding-left: 20px;
  margin-right:100px;
  font-weight: bold;
  font-size:18px;
  color:white !important;
}

.nav-link{
  color:white !important;
}

.card-header{
  font-weight: 200;
}
.chunky_header{
    margin-block-start: 0.83em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-size: 26px;
    font-weight: 900;
    letter-spacing: -0.015em;
    line-height: 1.3;
}

#story_img{
  height:80px; 
  width:80px; 
  border-radius:50%;
  margin-bottom: 8px;
  font-weight: bold;
}

#story_img:hover{
  opacity:0.7;
}

  #detail{
    list-style:none;
    padding-top:10px;
  }

  .profile_section{
      padding-top:40px;
  }

  .personal_details{  
    width:100%;
    padding:15px;
    margin-top:10px;
    margin-bottom: 10px;
    border:1px solid #dddfe2;
    background-color:#ffffff;
  }

  .navbar {
    z-index: 1;
    overflow: hidden;
    position: fixed;
    top: 0;
    width: 100%;
  }
  
  .navbar a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-decoration: none;
  }

.navButton {
  /* Make buttons look nice */ 
  cursor: pointer;
  color: black;
  font-size: 14px;
  user-select: none;
  padding: 140px 5px 0px 5px;
}

.navButton:hover {
  opacity: 1;
}

ul{
  list-style: none;
}

#song_item li{
  margin:10px 0px 10px 0px;
}

/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}

</style>
</head>
<div class="container" id="top-row">
<a href="{{ url('/home') }}" class="btn btn-warning">Back</a>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class = "container">    
              <div class="feed_item">
                <h4 class="chunky_header">
                  {{ $story->user->name }}'s Story 
                  <!-- Causes unknown error -->
                  <!-- <img src="uploads/avatars/{{ $story->user->avatar }}" id="story_img" style="float:right;"> -->
                </h4>
                <br>                
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Song Title</td>
                                <td>{{ $story->song->title }}</td>
                            </tr>
                            <tr>
                                <td>Artist</td>
                                <td>{{ $story->song->artist }}</td>
                            </tr>
                            <tr>
                                <td>Album</td>
                                <td>{{ $story->song->album }}</td>
                            </tr>
                            <tr>
                                <td>Genre</td>
                                <td>{{ $story->song->genre }}</td>
                            </tr>
                            <tr>
                                <td>Year</td>
                                <td>{{ $story->song->year }}</td>
                            </tr>
                            <tr>
                                <td>Listen</td>
                                <td>
                                    <audio controls style="height:18px;">
                                    <source src="{{ $story->song->song_link }}" type="audio/mpeg">
                                    </audio>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                        
                </div>
            </div>  
      </div>
</div>
@endsection
