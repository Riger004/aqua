<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale-1.0">
	<title>Log in</title>
	<link rel="stylesheet"  href="/css/app.css">
</head>
<body >

	<div class="first_page">
		<h3>The best answers to any questions</h3>
	</div>

	
	<div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <h1 class="text-center login-title">Sign in to continue to Quora</h1>
                <div class="account-wall">

                    <form method="POST" class="form-signin">
                       {{ csrf_field() }}
                       <div>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus >
                    </div>

                    <div>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autofocus>
                    </div>

                    <div>
                        <input type="checkbox" name="remember"> Remember Me
                    </div>

                    <div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                    </div>
                </form>
            </div>
            <a href="/password/email" class="pull-right need-help">forgot password?</a>
            <hr>
            <h1 class="text-center login-title">Or use social account</h1>
            <a  href="#" class="btn btn-lg btn-primary btn-block">
                    facebook</a>
                    <a href="#" class="btn btn-lg btn-primary btn-block" >
                    Gmail</a>
            <a href="/auth/register" class="text-center new-account">Create an account </a>
        </div>
    </div>

</div>



</body>
</html>