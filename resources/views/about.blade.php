@extends('layouts.app')

@section('content')

<div class="row" id="top-row">
    <div class="col-md-12">
      <!---->
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
    <!-- column displayed on left -->
        <div class="col-md-7">
            <h2 class="chunky_header">About Us</h2>
                <p> AudioNet is a web app that allows you to share your music taste with friends. 
                You can post your own story and see what your friends are listening to by viewing their stories. AudioNet also recommends
                music to you based on what you post to your story. AudioNet also keeps you up to date with what music events are on near 
                you so you know when your favourite artist is performing in your city, you'll know.
                
                Your Music, Your Network.
                </p>
                
                Check out our demo video down below 
                <br><br>
                <!-- video showing demo of website -->
                <div id="video" style="margin:0px; padding:0px;">
                <video width="580" height="350" controls>
                    <source src="css/AudioNet_demo.mp4" type="video/mp4">
                </video>
            </div>
               
           
        </div>
        <!-- column displayed on right -->
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
