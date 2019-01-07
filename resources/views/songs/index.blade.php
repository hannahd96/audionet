@extends('layouts.app')

@section('content')
<div class = "container">
<div class= "row">
	<div class = "col-md-12">
		<div class = "panel panel-default" id="panel-background">
			<div class = "panel-heading" style="background-color:#202226; color:#d6bf83">
				Songs
				<!-- ADD BUTTON AT TOP OF MODAL -->
				<button type="button" class="btn btn-link" id="btn-add-song">Add</button>
					<!-- MODAL -->
                    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="background-color:#202226;">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="modal-song-heading"></h4>
                                </div>
                                <div class="modal-body">
								<!-- LOADS ALL SONGS BEING STORED IN DB -->
                                    <form id="form-song" action="{{ route('songs.store') }}" >
									<!-- EACH FIELD STORED IN FORM GROUP DIV -->
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" name="title" value="" />
											<!-- CALLS ERROR MSG -->
                                            <span class="error" id="error-title"></span>
                                        </div>
										<div class="form-group">
                                            <label for="artist">Artist</label>
                                            <input type="text" class="form-control" id="artist" name="artist" value="" />
											<!-- CALLS ERROR MSG -->
                                            <span class="error" id="error-artist"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="album">Album</label>
                                            <input type="text" class="form-control" id="album" name="album" value="" />
											<!-- CALLS ERROR MSG -->
                                            <span class="error" id="error-album"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="year">Year</label>
                                            <input type="text" class="form-control" id="year" name="year" value="" />
                                            <span class="error" id="error-year"></span>
                                        </div>
                                      	<div class="form-group">
                                            <label for="genre">Genre</label>
                                            <input type="text" class="form-control" id="genre" name="genre" value="" />
                                            <span class="error" id="error-genre"></span>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" id="btn-submit"></button>
                                </div>
                            </div>
                        </div>
                    </div>
			</div>
			<div class = "panel-body" >
				@if (Session::has('message'))
					<div class="alert alert-info">
						{{ Session::get('message') }}
					</div>
				@endif

				@if (count($songs) === 0)
					<p>There are no Songs</p>
				@else
					<table class="table table-hover" style = "color:black;">
						<thead>
								<th>Title</th>
								
								<th>Artist</th>

								<th>Album</th>
								
								<th>Genre</th>
								
								<th>Actions</th>
								
						</thead>
						<tbody>
						@foreach ($songs as $song)
							<tr>
								<td>{{ $song->title }}</td>
								
								<td>{{ $song->artist }}</td>
								
								<td>{{ $song->album }}</td>
								
								<td>{{ $song->genre }}</td>
								
								<td>
								
									<a href="{{ route('songs.show', array('song' => $song)) }}" 
									class="btn btn-default">View</a>
									<a href="{{ route('songs.edit', array('song' => $song)) }}" 
									class="btn btn-warning">Edit</a>
						
									<form style = "display:inline-block" method = "POST" action = "{{ route('songs.destroy', array('song' => $song)) }}">
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="_token" value=" {{ csrf_token() }} ">		
										<button type = "submit" class = "btn btn-danger">Delete</button>
									</form>
						
								</td>
							</tr>
								@endforeach
						</tbody>
					</table>
				@endif
			</div>
		</div>
	</div>
</div>
</div>

@endsection
