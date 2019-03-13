@extends('layouts.app')

@section('content')
<head>
  <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Exo|Julius+Sans+One|Questrial|Varela" rel="stylesheet">

<div class="container" id="top-row">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="container">
                <div class="feed_item" style="padding-bottom:70px;">
                <h4 class="chunky_header">
                    Add story
                </h4>

                Choose a song from the list below to add to your story.
              <br><br>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('stories.store') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group"> 
                                <select class = "form-control" name="song_id">
                                    @foreach ($songs as $song)
                                    <option value="{{ $song->id }}">{{ $song->title }} - {{ $song->artist }}</option>
                                    @endforeach
                                </select>
                               
                        </div>
                    
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </form>
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection
