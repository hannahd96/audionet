@extends('layouts.app')

@section('content')
<head>

  <!-- JQuery link needed for "back to top" button -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script>
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
    </script>

</head>
    <div class="container" id="top-row">
    <!-- center all content -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="chunky_header">Your Music</h2>
                <div class="description">
                    <p>AudioNet recommends music to you based on what music you like. Listen to the song snippet
                    included in each song and simply like or dislike the song; the system will shape it's recommendations
                    around this. <br>               
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">        
                   <!-- return all song items as a list item in an unordered list -->
                    <div id="song_item">
                    @if (count($songs) === 0)
                            <p>There are no songs!</p>
                        @else
                        @foreach ($songs as $song)
                        <ul>
                            <li><b>{{ $song->title }}</b></li>
                            <li>{{ $song->artist }}</li>
                            <li>
                                <a href="{{ route('song_ratings.create', $song->id) }}" style="float:right;" class="btn btn-primary">Rate Song</a>
                            </li>
                            <li>{{ $song->album }}</li>
                            <li>{{ $song->genre }}</li>
                            <li>{{ $song->year }}</li>
                            <li>     
                                <audio controls style="width:100%; height:18px;">
                                    <source src="{{ $song->song_link }}" type="audio/mpeg">
                                </audio>
                            </li>
                           
                        </ul><br><hr><br>
                        @endforeach
                    @endif
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