<html>
<head>
  <title>Aqua -Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale-1.0">
  <link rel="stylesheet"  href="/css/app.css">
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>



</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/home">aqua</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li  ><a href="/home">Home<span class="sr-only">(current)</span></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Name <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/profiles/create">Proflie</a></li>
              <li><a href="#">Blogs</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Settings</a></li>
              <li role="separator" class="divider"></li>
              
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>

        <div class="navbar-form navbar-left">

          <button class="btn btn-default" id="ask" data-toggle="modal" data-target="#myQuestion">Ask Question?</button>

        </div>
      </ul>

      

      @if(Auth::check())
      <ul class="nav navbar-nav navbar-right" >
        <li><a href="/auth/logout">Logout</a></li>

      </ul>
      <p class="navbar-text navbar-right">
        Hello, {{ Auth::user()->name }}
      </p>
      @endif
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- Button trigger modal -->

<div class="container">
  @yield('content')
</div>


@yield('scripts.footer')

<div class="modal fade" id="myQuestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Type your question here</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="/questions" enctype="multipart/form-data" class="col-md-6">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="question_topic">Topic of the question:</label></br>
            <input type="text" name="question_topic" id="question_topic" class="form-control" value="{{old('question_topic')}}" >

          </div>

          <div class="form-group">
            <input type="checkbox" name="anonymously" value="Yes" > Put Anonymously?
          </div>


          <div class="form-group">
            <label for="question">Question?</label></br>
            <input type="text" name="question" id="question" class="form-control" value="{{old('question')}}" >

          </div>


          <div class="form-group">
            <label for="details">Details:</label></br>
            <textarea type="textarea" name="details" id="details" class="form-control" row="10" value="{{old('details')}}" required></textarea>

          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>