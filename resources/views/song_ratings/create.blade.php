@extends('layouts.app')

@section('content')
<head>
<link href = "css/main.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Exo|Julius+Sans+One|Questrial|Varela" rel="stylesheet">
</head>
<div class="container" id="top-row">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5>Add Song Rating for {{ $song->title }}</h5>
                </div>

                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('song_ratings.store', $song->id) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <br>
                            <i>* 10 being the best, 1 being the worst. </i>
                            <br><br>
                            <select name="rating" id="rating" class="form-control">
                                <option {{ (old('rating') == '1' ) ? 'selected' : '' }}>1</option>
                                <option {{ (old('rating') == '2' ) ? 'selected' : '' }}>2</option>
                                <option {{ (old('rating') == '3' ) ? 'selected' : '' }}>3</option>
                                <option {{ (old('rating') == '4' ) ? 'selected' : '' }}>4</option>
                                <option {{ (old('rating') == '5' ) ? 'selected' : '' }}>5</option>
                                <option {{ (old('rating') == '6' ) ? 'selected' : '' }}>6</option>
                                <option {{ (old('rating') == '7' ) ? 'selected' : '' }}>7</option>
                                <option {{ (old('rating') == '8' ) ? 'selected' : '' }}>8</option>
                                <option {{ (old('rating') == '9' ) ? 'selected' : '' }}>9</option>
                                <option {{ (old('rating') == '10' ) ? 'selected' : '' }}>10</option>
                            </select>
                        </div>
                        <a href="{{ route('yourMusic') }}" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
