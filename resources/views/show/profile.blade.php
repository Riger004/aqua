@extends('layout')
<title>profile</title>
@section('content')
<h1>add details about what you know</h1>
<div class="row">
	<div  >
		@if(isset($user->photo) And isset($person->name) )
		<img class="profile-pic" src="{{$user->photo}}" alt="set you pic">
		<H3 class="profile-pic-text">{{$person->name}}</H3>
		@endif
	</div>
	<hr>
	<div class="col-xs-3">
		<h3>Knows About</h3>
		<text >What topics do you know about?</text>
		<h4>
			@if (isset($user->about))
			{{$user->about}}
			@endif
		</h4>
		
	</div>

	<div class="col-xs-3">
		<h3>Employment</h3>
		<text >Where have you worked?</text>
		<h4>
			@if(isset($user->employment))
			{{$user->employment}}
			@endif
		</h4>
	</div>
	<div class="col-xs-3">
		<h3>Education</h3>
		<text>Where have you studied?</text>
		<h4>
			@if(isset($user->education))
			{{$user->education}}
			@endif
		</h4>
	</div>

	<div class="col-xs-3">
		<h3>Location</h3>
		<text>Where do you currently live?</text>
		<h4>
			@if(isset($user->location))
			{{$user->location}}
			@endif
		</h4>
	</div>

	<hr>
	<div class="col-xs-3">
		<h3>Bio</h3>
		<text>Add a profile bio</text>
		<h4>
			@if(isset($user->bio))
			{{$user->bio}}
			@endif
		</h4>
	</div>
	<div class="col-xs-3">
		<h3>Description</h3>
		<text>write a description about yourself</text>
		<h4>
			@if(isset($user->description))
			{{$user->description}}
			@endif
		</h4>
	</div>
</div>

<hr>


@if($person=='new user' OR Auth::user()->id==$person->id)
 
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="m_button">
	Change your profile
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modal title</h4>
			</div>
			<div class="modal-body">
				<form method="POST" action="/profiles" enctype="multipart/form-data" class="col-md-6">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="about">about:</label></br>
						<input type="text" name="about" id="about" class="form-control" value="{{old('about')}}" >

					</div>

					<div class="form-group">
						<label for="employment">employment:</label></br>
						<input type="text" name="employment" id="employment" class="form-control" value="{{old('employment')}}" >

					</div>

					<div class="form-group">
						<label for="education">education:</label></br>
						<input type="text" name="education" id="education" class="form-control" value="{{old('education')}}" >

					</div>

					<div class="form-group">
						<label for="location">location:</label></br>
						<input type="text" name="location" id="location" class="form-control" value="{{old('location')}}" >

					</div>

					<div class="form-group">
						<label for="bio">bio:</label></br>
						<input type="text" name="bio" id="bio" class="form-control" value="{{old('bio')}}" >

					</div>

					<div class="form-group">
						<label for="description">descriptiono:</label></br>
						<textarea type="textarea" name="description" id="description" class="form-control" row="10" value="{{old('description')}}" required></textarea>

					</div>




				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>

			<h2>Add your photos</h2>
			@if(isset($user->id))
			<form id="file" action="/profiles/{{$user->id}}/photos" name="file" method="POST" class="dropzone">
				{{ csrf_field() }}
			</form>
			@endif

		</div>
	</div>
</div>

@endif

@stop


@section('scripts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.js"></script>

<script>


Dropzone.options.file={

	

	maxFileSize: 3,

	maxFiles: 1,

	acceptedFiles: '.jpg, .jpeg, .png, .bmp'

};


</script>

@stop