@extends('layouts.app')

@section('content')
<head>
  <!--  <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css"> -->
  <link href = "css/main.css" rel="stylesheet">
  
</head>    
<div class="row">
    <div class="col-md-12">
        <div class="user_stories">
            <div class = "user_story_item">
               <!-- click on the image to open the modal and add song to story -->
                    <img src="uploads/avatars/{{ Auth::user()->avatar }}" style="height:75px; width:75px; border-radius:50%">
                
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Hello, {{ Auth::user()->name }}. You are logged in! -->
                
            <div class = "container">
                <h2 style="padding-top:20px;">Main Feed</h3>
                
                <div class="feed_item">
                    <h4>
                        "thank u, next" reaches 150m views
                    </h4>
                    <p>Ariana Grande's "thank u, next" has accumulated 150 million views on YouTube after just 2 weeks. 
                        The music video features cameos from Johnathon Bennett, Troye Sivan and Colleen Ballinger, and takes 
                        references from movies like "Mean Girls" and "13 Going On 30". The video is also 2# on Trending.
                        <div class="feed_item_image">
                            <img src = "images/thankUNext.jpg" alt="thankUNext" width="40%">
                        </div>
                    </p>
                    <hr>
                    <!-- COMMENT SECTION -->
                    <h5>Comments</h5>
                    <form action="" method="POST">
						Username: <input type="text" name="name"><br>
						Comment: <input type="text" name="comment"><br>
						<input type="submit" class="btn btn-primary" name="submitComment" value="Submit">
				    </form>
                   
                </div>
               
                <div class="feed_item">
                    <h4 class="feed_item_head">
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


<footer style="padding:20px;">
    AudioNet 2018 &copy
</footer>
@endsection
