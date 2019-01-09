@extends('layouts.app')

@section('content')
<div class = "container">
	<div class = "row">
		<div class = "col-md-8 col-md-offset-2">
			<div class = "panel panel-default">
				<div class = "panel-heading">
					Add a New Song
				</div>		
				<div class = "panel-body">
						@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						<form method="POST" action="{{ route('songs.store') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
							
							<div class = "form-group">
								<label for="title">Title</label>
								<input type="text" class = "form-control" id = "title" name = "title" value="{{ old('title') }}" />
							</div>
							<div class = "form-group">
								<label for="artist">Artist</label>
								<input type="text" class = "form-control" id = "artist" name = "artist" value="{{ old('artist') }}" />
							</div>
							<div class = "form-group">
								<label for="album">Album</label>
								<input type="text" class = "form-control" id = "album" name = "album" value="{{ old('album') }}" />
							</div>
							<div class = "form-group">
								<label for="genre">Genre</label>
								<input type="text" class = "form-control" id = "genre" name = "genre" value="{{ old('genre') }}" />
							</div>
							<div class = "form-group">
								<label for="year">Year</label>
								<input type="text" class = "form-control" id = "year" name = "year" value="{{ old('year') }}" />
							</div>
							<div class = "form-group">
								<label for="album_cover">Album Cover</label>
								<input type="text" class = "form-control" id = "album_cover" name = "album_cover" value="{{ old('album_cover') }}" />
							</div>
							<a href="{{ route('songs.index') }}" class="btn btn-default">Cancel</a>
							<button type = "submit" class = "btn btn-primary pull-right">Submit</button>
						</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
