@extends('layouts.app')

@section('content')
<div class="container" id="top-row">
<a href="{{ url('/home') }}">Back</a>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class = "container">    
              <div class="feed_item">
                <h4 class="chunky_header">
                  {{ $story->user->name }}'s Story 
                  <img src="uploads/avatars/{{ $story->user->avatar }}" id="story_img" style="float:right;">
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
