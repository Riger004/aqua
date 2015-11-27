@extends('layout')


@section('content')

<p>{{$topic->question_topic}}</p>
<h1>{{$question->question}}</h1>

@if(isset($name))
<h3>Answers:</h3>

@foreach($name as $ans)
@if($question->question==$ans->question)
<h4>Answered by {{$ans->name}}</h4>
<p>{{$ans->answer}}</p>
<form method="POST" action="/vote/<?php echo urlencode($question->question)?>/<?php echo urlencode($ans->answer)?>" enctype="multipart/form-data">
  {{ csrf_field() }}
 <button type="submit">Upvoted {{$ans->upvoted}}</button>
</form>
<form method="POST" action="/downvote/<?php echo urlencode($question->question)?>/<?php echo urlencode($ans->answer)?>" enctype="multipart/form-data">
  {{ csrf_field() }}
 <button type="submit">DownVoted {{$ans->downvoted}}</button>
</form>
<hr>
@endif
@endforeach






@endif

<form method="POST" action="/answers/<?php echo urlencode($question->question) ?>" enctype="multipart/form-data" class="col-md-6">
  {{ csrf_field() }}



  <div class="form-group">
    <label for="answer">answer:</label></br>
    <textarea type="textarea" name="answer" id="answer" class="form-control" row="15" col="15" value="{{old('answer')}}" required></textarea>

  </div>
  <button type="submit" class="btn btn-primary">Save changes</button>

</form>




@stop






@stop