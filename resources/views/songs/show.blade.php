@extends('layouts.app')

@section('content')
<div class="container" id="top-row">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class = "container">    
              <div class="feed_item">
                <h4 class="chunky_header">
                  {{ $song->title }} 
                 
                </h4>
                <br>                
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Song Title</td>
                                <td>{{ $song->title }}</td>
                            </tr>
                            <tr>
                                <td>Artist</td>
                                <td>{{ $song->artist }}</td>
                            </tr>
                            <tr>
                                <td>Album</td>
                                <td>{{ $song->album }}</td>
                            </tr>
                            <tr>
                                <td>Genre</td>
                                <td>{{ $song->genre }}</td>
                            </tr>
                            <tr>
                                <td>Year</td>
                                <td>{{ $song->year }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                        
                </div>
            </div>  
      </div>
</div>
@endsection
