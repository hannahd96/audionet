@extends('layouts.app')

@section('content')
<head>
  <!--  <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css"> -->
  <link href = "css/main.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
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

// scroll to bottom function
  $("a[href='#bottom']").click(function() {
    $("html, body").animate({ scrollTop: $(document).height() }, "slow");
  return false;
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

  window.setInterval(function() {
    $('#previous').click();
  }, 2500);

});
    </script>
 </head>    
<br><br><br><br>

<div class="row justify-content-center" style="width:101.2% !important;">
    <div class="cover_photo" style="width:100%; height:90px;">
    <div class="col-md-12">
    <div class="centered" style="margin-top:17%;">
            Explore our Music Library with hundreds of songs to choose from
            <br>
            <form action="{{ url('/songs') }}">
                <input type="submit" class="btn btn-primary" id="music_lib_btn" value="Music Library">
            </form>
        </div>
    </div>
     
        <img src="css/background_11.jpg" alt="cover_photo" style="width:100%; height:500px;">
    </div>
</div>   
    
    <!-- <div class="row justify-conent-center" style="margin-top:24%; margin-left:49%">
        <a href="#bottom" class="down_arrow" style="font-size:48px;">
        &#x2B07;
            
            <img src="css/down_arrow.jpg" alt="downArrow" style="width:30px; height:15px;"> 
        </a>
    </div>   -->
     
    <br>

<h5 style="margin-left:10%; margin-top:33%; margin-bottom:30px;">User Stories</h5>
<div class="row">
    <table>
        <tbody>
            <tr>
                <a href="{{ route('stories.create') }}" class="btn btn-link" style="margin-left:130px;">
                    <img src="css/black_plus.png" id="story_img">
                    <p style="margin-top:5px; text-decoration:none; color:black" id="hover_no_dec">Share a song you like</p>
                </a>
                
                @foreach ($stories as $story) 

                <a href="{{ route('stories.show', $story->id) }}" class="user_story">
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
                    <div class="popular_song_container">
                        <div class="popular_song_table">
                           <h5>Popular Songs</h5>
                           <table class="table">
                                <th>Song Title</th>
                                <th>Artist</th>
                                <th>Listen</th>
                                <tbody>
                                <!-- return top 5 popular songs -->
                                    @foreach (App\Song::top(5) as $song)
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
                    <!-- <div class="rec_songs_container">
                        <div class="rec_songs_table">
                           <h5>Suggestions For You</h5>
                                
                           
                             

                            <table class="table">
                                <th>Song Title</th>
                                <th>Artist</th>
                                <th>Listen</th>
                                <tbody>
                                
                                </tbody>
                            </table>


                        </div>
                    </div> -->
                    <div class="rec_songs_container">
                        <div class="rec_songs_table">
                           <h5>Pop Music</h5>
                            
                           <table class="table">
                                <th>Song Title</th>
                                <th>Artist</th>
                                <th>Listen</th>
                                <tbody>
                                
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
        <div class="col-md-4">                
            
        <div id="showContainer" style="margin-top:12%;">
            
            <div class="navButton" id="previous" style = "float:left">
                <
            </div>
            <div class="navButton" id="next" style = "float:right">
                >
            </div>

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
@endsection
