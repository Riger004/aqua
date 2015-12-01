@extends('layout')
<title>Topic-aqua</title>

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
      <h2>Selected topic 
        @if(isset($topic))
          {{$topic}}
        @endif
        <hr>
        @if(isset($question))
          @foreach($question as $qu)
            <a href="/question/<?php echo urlencode($qu->question) ?>">{{$qu->question}}</a>
            <hr>
          @endforeach
        @endif

      </h2>
      </div>
    </div>
  </div>

  @stop