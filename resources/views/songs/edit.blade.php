@extends('layouts.app')

@section('content')
<div class = "container">
	<div class = "row">
		<div class = "col-md-8 col-md-offset-2">
		<!-- with the id the panel is styled from CSS above -->
			<div class = "panel panel-default" id="panel-background">
			<div class = "panel-heading" style="background-color:#202226; color:#d6bf83">
					Update Movie
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
					<form method="POST" action="{{ route('songs.update', array('song' => $song)) }}" style = "color:black;">
						<!-- USE LINE BELOW BECAUSE BROWSERS CANNOT PROCESS PUT REQUESTS -->
						<input type="hidden" name="_method" value="PUT">
						<!-- LINE BELOW STOPS HACKERS -->
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
							
							<!-- EACH FIELD IN FORM -->
							<div class = "form-group">
								<label for="title">Title</label>
								<input type="text" class = "form-control" id = "title" name = "title" value="{{ old('title', $song->title) }}" />
							</div>
							<div class = "form-group">
								<label for="title">Artist</label>
								<input type="text" class = "form-control" id = "artist" name = "artist" value="{{ old('artist', $song->artist) }}" />
							</div>
							<div class = "form-group">
								<label for="album">Album</label>
								<input type="text" class = "form-control" id = "album" name = "album" value="{{ old('album', $song->album) }}" />
							</div>
							<div class = "form-group">
								<label for="genre">Genre</label>
								<input type="text" class = "form-control" id = "genre" name = "genre" value="{{ old('genre', $song->genre) }}" />
							</div>
							<div class = "form-group">
								<label for="year">Year</label>
								<input type="text" class = "form-control" id = "year" name = "year" value="{{ old('year', $song->year) }}" />
							</div>
							<!-- RETURNS USER TO INDEX -->
							<a href="{{ route('songs.index') }}" class="btn btn-default">Cancel</a>
							<button type = "submit" class = "btn btn-primary pull-right">Submit</button>
						</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
