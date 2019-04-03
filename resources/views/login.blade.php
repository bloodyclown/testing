<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Lara Login</title>
        <!-- Tell the browser to be responsive to screen width -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>        
    </head>
    <body>        
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <form action="{{ URL::to('login') }}" method="post">
                    @csrf
                    <input type="text" id="login" class="fadeIn second" name="email" placeholder="login">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    <input type="submit" class="fadeIn fourth" value="Log In">
                </form>
            </div>
        </div>
    </body>
</html>
