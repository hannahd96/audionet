@extends('layouts.app')

@section('content')
<div class = "container">
	<div class = "row">
		<div class = "col-md-8 col-md-offset-2">
		
		<!-- with the id the panel is styled from CSS above -->
			<div class = "panel panel-default" id="panel-background">
			<div class = "panel-heading" style="background-color:#202226; color:#d6bf83">
				<!-- loads name of song being viewed -->
					Movie: {{ $song->title }}
				</div>
				<!-- loads data for song being viewed -->
				<div class="panel-body">
					<table class="table table-hover">
						<tbody style = "color:black;">
							<tr>
								<td>Title</td>
								<td>{{$song->title}}</td>
							</tr>
							<tr>
								<td>Age Rating</td>
								<td>{{$song->age_rate}}</td>
							</tr>
							<tr>
								<td>Year Released</td>
								<td>{{$song->year}}</td>
							</tr>
							<tr>
								<td>Run Time (mins)</td>
								<td>{{$song->length}}</td>
							</tr>
							<tr>
								<td>Price</td>
							<td>{{$song->price}}</td>
							<tr>
								<td>Genre</td>
								<td>{{$song->genre}}</td>
							</tr>
						</tbody>
					</table>
					<!-- buttons at end of panel -->
					<a href="{{ route('songs.index') }}" class="btn btn-default">Back</a>
					<a href="{{ route('songs.edit', array ('song' => $song)) }}" class="btn btn-warning">Edit</a>
					
					<form style = "display:inline-block" method = "POST" action = "{{ route('songs.destroy', array('song' => $song)) }}">
						<input type="hidden" name="_method" value="DELETE">
						<input type="hidden" name="_token" value=" {{ csrf_token() }} ">		
						<button type = "submit" class = "btn btn-danger">Delete</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
