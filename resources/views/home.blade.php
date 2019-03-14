@extends('layouts.app')

@section('content')
<head>
  <!-- JQuery link needed for "back to top" button -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>

    <script>
    $(document).ready(function() {
        $('#previous').on('click', function(){
            // Change to the previous image
            $('#im_' + currentImage).stop().fadeOut(1);
            decreaseImage();
            $('#im_' + currentImage).stop().fadeIn(1);
        }); 
        $('#next').on('click', function(){
            // Change to the next image
            $('#im_' + currentImage).stop().fadeOut(1);
            increaseImage();
            $('#im_' + currentImage).stop().fadeIn(1);
        }); 

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

  var currentImage = 1;
  var totalImages = 3;

  function increaseImage() {
    /* Increase currentImage by 1.
    * Resets to 1 if larger than totalImages
    */
    ++currentImage;
    if(currentImage > totalImages) {
      currentImage = 1;
    }
  }
  function decreaseImage() {
    /* Decrease currentImage by 1.
    * Resets to totalImages if smaller than 1
    */
    --currentImage;
    if(currentImage < 1) {
      currentImage = totalImages;
    }
  }
    //   automates the slideshow
  window.setInterval(function() {
    $('#previous').click();
  }, 2500);

});
    </script>
 </head>    
<br><br><br><br>
<!-- center all content -->
<div class="row justify-content-center" style="width:101.2% !important;">
    <div class="cover_photo" style="width:100%; height:90px;">
    <div class="col-md-12">
    <!-- centered - centers text overlaying the image -->
    <div class="centered" style="margin-top:17%;">
            Explore our Music Library with hundreds of songs to choose from
            <br>
            <!-- link to music library -->
            <form action="{{ url('/songs') }}">
                <input type="submit" class="btn btn-primary" id="music_lib_btn" value="Music Library">
            </form>
        </div>
    </div>
     <!-- cover photo -->
        <img src="css/background_11.jpg" alt="cover_photo" style="width:100%; height:700px;">
    </div>
</div>   
     
    <br>

<h5 style="margin-left:10%; margin-top:33%; margin-bottom:30px;">User Stories</h5>
<div class="row">
    <table>
        <tbody>
            <tr>
            <!-- for user logged in to create a story -->
                <a href="{{ route('stories.create') }}" class="btn btn-link" style="margin-left:130px;">
                    <img src="css/black_plus.png" id="story_img">
                    <p style="margin-top:5px; text-decoration:none; color:black" id="hover_no_dec">Share a song you like</p>
                </a>
                    <!-- return a story from objedt stories containing many stories -->
                @foreach ($stories as $story) 
                    <!-- show other stories by other users. when clicked on they return a view showing song details -->
                <a href="{{ route('stories.show', $story->id) }}" class="user_story">
                    <!-- user profile picture -->
                    <img src="uploads/avatars/{{ $story->user->avatar }}" class="image" id="story_img">
                    <p style="margin-top:5px;">{{ $story->user->name }}</p>
                </a>
                @endforeach
            </tr>
        </tbody>
    </table>


</div>
 <br>
<hr>
<div class="container">
<br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
            <!-- each table of songs recommended are stored in their own container -->
                    <div class="popular_song_container">
                        <div class="popular_song_table">
                           <h5>Popular Songs</h5>
                           <table class="table">
                                <th>Song Title</th>
                                <th>Artist</th>
                                <th>Listen</th>
                                <tbody>
                                <!-- return top 5 popular songs -->
                                <!-- for each song object, return it as a table row -->
                                    @foreach (App\Song::top(5) as $song)
                                    <tr>
                                        <td>{{ $song->title }}</td>
                                        <td>{{ $song->artist }}</td>
                                        <td>
                                        <!-- link to song stored on server -->
                                            <audio controls style="width:100%; height:18px;">
                                                <source src="{{ $song->song_link }}" type="audio/mpeg">
                                            </audio>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                           </table>
                        </div>
                    </div>
                    <div class="rec_songs_container">
                        <div class="rec_songs_table">
                           <h5>Suggestions For You</h5>
                           <table class="table">
                                <th>Song Title</th>
                                <th>Artist</th>
                                <th>Listen</th>
                                <tbody>
                                <!-- calls function in the model -->
                                <!-- return top 5 random songs recommended to user -->
                                <!-- for each song object, return it as a table row -->
                                @foreach (App\Song::recommended(5) as $song)
                                    <tr>
                                        <td>{{ $song->title }}</td>
                                        <td>{{ $song->artist }}</td>
                                        <td>
                                            <audio controls style="width:100%; height:18px;">
                                                <source src="{{ $song->song_link }}" type="audio/mpeg">
                                            </audio>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                    <div class="rec_songs_container">
                        <div class="rec_songs_table">
                           <h5>Pop Music</h5>
                            
                           <table class="table">
                                <th>Song Title</th>
                                <th>Artist</th>
                                <th>Listen</th>
                                <tbody>
                                <!-- calls function in the model -->
                                <!-- return 5 pop songs -->
                                <!-- for each song object, return it as a table row -->
                                @foreach (App\Song::popMusic(5) as $song)
                                    <tr>
                                        <td>{{ $song->title }}</td>
                                        <td>{{ $song->artist }}</td>
                                        <td>
                                            <audio controls style="width:100%; height:18px;">
                                                <source src="{{ $song->song_link }}" type="audio/mpeg">
                                            </audio>
                                        </td>
                                    </tr>
                                    @endforeach
                               
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="rec_songs_container">
                        <div class="rec_songs_table">
                           <h5>Electronic Music</h5>
                            <table class="table">
                                <th>Song Title</th>
                                <th>Artist</th>
                                <th>Listen</th>
                                <tbody>
                                <!-- calls function in the model -->
                                <!-- return 5 electronic songs  -->
                                <!-- for each song object, return it as a table row -->
                                @foreach (App\Song::electronicMusic(5) as $song)
                                <tr>
                                    <td>{{ $song->title }}</td>
                                    <td>{{ $song->artist }}</td>
                                    <td>
                                        <audio controls style="width:100%; height:18px;">
                                            <source src="{{ $song->song_link }}" type="audio/mpeg">
                                        </audio>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
            </div>
        </div>
        <div class="col-md-4" style="margin-top:2%;">                
            <h5>News Feed</h5>
            <!-- slideshow of news items -->
            <div id="showContainer" style="margin-top:5%;">
                <!-- previous and next slide btns -->
                <div class="navButton" id="previous" style = "float:left">
                ◀
                </div>
                <div class="navButton" id="next" style = "float:right">
                ▶
                </div>
                    <!-- images being returned -->
                    <div class="imageContainer" id="im_1">
                        <img src="css/blog_posts/news_01.jpg">
                    </div>
    
                    <div class="imageContainer" id="im_2">
                        <img src="css/blog_posts/news_02.jpg" >
                    </div>
    
                    <div class="imageContainer" id="im_3">
                        <img src="css/blog_posts/news_3.jpg" >
                    </div>
                
              </div>
                
            </div>

        </div>
    </div>
</div>
</div>
<!-- Scroll button -->
<div id="scroll_top_auto" style="float:right; text-align:right;">
        <p id="back-top">
            <a href="#top"><span style="font-size:40px;">^</span></a>
        </p>
    </div>
@endsection
