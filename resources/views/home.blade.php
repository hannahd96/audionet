@extends('layouts.app')

@section('content')
<head>
  <!--  <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css"> -->
  <link href = "css/main.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Exo|Julius+Sans+One|Questrial|Varela" rel="stylesheet">

  <script>
  $(document).ready(function(){

// hide #back-top first
$("#back-top").hide();

// fade in #back-top
$(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#back-top').fadeIn();
        } else {
            $('#back-top').fadeOut();
        }
    });

    // scroll body to 0px on click
    $('#back-top a').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
});

});
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
<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main" class="main">
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

<div class="row">
    <div class="col-md-12">
        <div class="user_stories" style="margin-top:20px;">
            <div class = "user_story_item" style="padding-left:30px;">
               <!-- click on the image to open the modal and add song to story -->
                   <a href="{{ url('add_story') }}">
                    	<img src="uploads/avatars/{{ Auth::user()->avatar }}" style="height:60px; width:60px; border-radius:50%">
                    </a>
                    <p style="margin-top:5px;">{{ Auth::user()->name }}</p>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
                <h2>Popular Songs</h2>
                    <div class="popular_song">

                    </div>
            </div>
        </div>
        <div class="col-md-4">                
            <div class = "container" id="feed_items">    
            <div class="feed_item">
                    <p id="feed_item_date">
                        14/1/19
                    </p>
                    <h4 class="chunky_header">
                    Sam Smith and Fifth Harmony’s Normani make early charts impact with new duet
                    </h4>
                    <p>
                    Sam Smith could topple reigning chart-topper Ava Max from the number one spot this week with his new single Dancing With A Stranger.
                    Smith’s song, a collaboration with Fifth Harmony singer Normani, is on course to be this week’s highest new entry, the Official Charts Company said.
                    The song is currently at number three at the halfway stage of the chart week, based on streams and downloads accrued since it was released on Friday.
                    <div class="feed_item_image" style="">
                        <blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr">Here it is, &#39;Dancing With A Stranger&#39;. <a href="https://t.co/kdTKNv2rOR">https://t.co/kdTKNv2rOR</a><br>Another musical baby. Popping them out over here!! Hope you enjoy it ❤️ I live for you <a href="https://twitter.com/Normani?ref_src=twsrc%5Etfw">@Normani</a> ❤️ <a href="https://twitter.com/hashtag/DancingWithAStranger?src=hash&amp;ref_src=twsrc%5Etfw">#DancingWithAStranger</a> <a href="https://t.co/ytxjNdqNsV">pic.twitter.com/ytxjNdqNsV</a></p>&mdash; Sam Smith (@samsmith) <a href="https://twitter.com/samsmith/status/1083619517790588929?ref_src=twsrc%5Etfw">January 11, 2019</a></blockquote>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                    </p>
                </div>            
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
<div id="scroll_top_auto" style="float:right; text-align:right;">
        <p id="back-top">
            <a href="#top"><span style="font-size:40px;">^</span></a>
        </p>
    </div>
@endsection
