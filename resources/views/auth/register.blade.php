<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale-1.0">
	<title>Register</title>
	<link rel="stylesheet"  href="/css/app.css">
</head>
<body >

	<div class="first_page">
		<h3>The best answers to any questions</h3>
	</div>

	
	<div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <h1 class="text-center login-title">Register to find the answers</h1>
                <div class="account-wall">

                    <form method="POST" action="/auth/register">
                        {!! csrf_field() !!}


                        <div>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required autofocus >
                        </div>

                        <div>
                            
                            <input type="email" name="email"  class="form-control" placeholder="email" value="{{ old('email') }}" required autofocus >
                        </div>

                        <div>
                            
                            <input type="password" name="password" class="form-control" placeholder="password" required autofocus >
                        </div>

                        <div>
                           
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required autofocus>
                        </div>

                        <div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                        </div>
                    </form>
                </div>

            </div>



        </body>
        </html>