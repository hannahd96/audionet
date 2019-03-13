@extends('layouts.app')

@section('content')
<head>
  <!--  <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css"> -->
  <link href="https://fonts.googleapis.com/css?family=Exo|Julius+Sans+One|Questrial|Varela" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
  
    <script type="text/javascript">
     
    </script>

  <!-- Style -->
  <link href = "css/main.css" rel="stylesheet">
 </head>

    <div class="container" id="top-row">
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
                           
                        </ul>
                        @endforeach
                    @endif
                    </div>
            </div>
            
        </div>
    </div>
</div>

@endsection