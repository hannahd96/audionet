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
  <a href="#">Discover</a>
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
        <div class="user_stories">
            <div class = "user_story_item" style="padding-left:30px;">
               <!-- click on the image to open the modal and add song to story -->
                   <a href="#">
                    	<img src="uploads/avatars/{{ Auth::user()->avatar }}" style="height:65px; width:65px; border-radius:50%">
                    </a>
                    <p style="margin-top:5px;">{{ Auth::user()->name }}</p>
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Hello, {{ Auth::user()->name }}. You are logged in! -->
                
            <div class = "container">                
                <div class="feed_item">
                    <p id="feed_item_date">
                        20/12/18
                    </p>
                    <h4 class="chunky_header">
                        "thank u, next" reaches 150m views
                    </h4>
                    <p>Ariana Grande's <a href="https://www.youtube.com/watch?v=gl1aHhXnN1k">"thank u, next"</a> has accumulated 150 million views on YouTube after just 2 weeks. 
                        The music video features cameos from Johnathon Bennett, Troye Sivan and Colleen Ballinger, and takes 
                        references from movies like "Mean Girls" and "13 Going On 30". The video is also 2# on Trending. 
                        <br>
                        <div class="feed_item_image">
                            <img src = "images/thankUNext.jpg" alt="thankUNext" width="40%">
                        </div>
                    </p>
                    <hr>
                    <!-- COMMENT SECTION -->
                    <button onclick="openCloseDiv();" 
                            class="btn btn-secondary" 
                            id="comment_button"
                            style="float:right;">
                        open / close
                    </button>
                        <h5>Comments</h5>
                            <div id="comment_section">
                                <form action="" method="POST">
                                    Username: <input type="text" name="name" class="form-control" style="width:75%"><br>
                                    Comment: <input type="text" name="comment" class="form-control" style="width:75%"><br>
                                    <input type="submit" class="btn btn-primary" name="submitComment" value="Submit">
                                </form>
                            </div>
                </div>
               
                <div class="feed_item">
                    <p id="feed_item_date">
                        17/12/18
                    </p>
                    <h4 class="chunky_header">
                        2019 Grammy Nominations' Snubs and Surprises
                    </h4>
                    <p>
                        The leading nominees in 2019 come from hip-hop; Kendrick Lamar, Drake and Childish Cambino to name but a few.
                        There are eight contenders each for Album of the Year, Record of the Year, Song of the Year and Best New Artist.
                        After receiving a lot of criticism for last years ceremony, the Grammy organisers took more steps this year to recruit
                        a younger and more diverse voting membership. However, as a result there are no nominations for Taylor Swift or Cardi B.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<footer style="padding:20px;">
    AudioNet 2018 &copy
</footer>
@endsection
