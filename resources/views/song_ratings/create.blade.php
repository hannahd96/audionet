@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add Song Rating for {{ $song->title }}
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
                            <label for="title">Rating</label>
                            <br>
                            <i>*rate the song out of 10. </i>
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
                        <a href="{{ route('yourMusic') }}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
