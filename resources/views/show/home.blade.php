@extends('layout')
<title>Home-aqua</title>

@section('content')

<div class="text-center col-md-4 col-md-offset-1">
	<h4>Stories for you</h4>
</div>

<hr>


<div class="container">
    <div class="row">
        <div class="col-xs-2">
           
        </div>
        <div class="col-xs-8">
          @if(isset($question))
          @foreach($question as $qu)
          <h3>{{$qu->question}}</h3>
          <p>posted by {{$qu->name}}</p>
          <hr>
        @endforeach
        @endif
        </div>
    </div>
</div>

	@stop