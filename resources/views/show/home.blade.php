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
      <h4>popular topics</h4>
      @if(isset($topic_count))
        @foreach($topic_count as $topic)
          <a href="/topics/<?php echo urlencode($topic->question_topic)?>">{{$topic->question_topic}}</a>
          <br>
        @endforeach
      @endif
    </div>
    <div class="col-xs-8">
      @if(isset($question))
      @foreach($question as $qu)
      <h3><a href="/question/<?php echo urlencode($qu->question) ?>")>
        {{$qu->question}}</h3></a>
        @if($qu->anonymously==0)
        <p>posted by {{$qu->name}}  </p>
        @else
        <p>posted anonymously</p>
        @endif
        <p>Details: {{$qu->details}}</p>
        
        <hr>
        @endforeach
        @endif
      </div>
    </div>
  </div>

  @stop