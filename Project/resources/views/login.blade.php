<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Full Page Sign In - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body
{
    background:url( {{asset( '/img/IMG_3151.JPG ' )}}) fixed;
    background-size: cover;
    padding: 0;
    margin: 0;
}

.wrap
{
    width: 100%;
    height: 100%;
    min-height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 99;
}
p.brand-title
{
    font-family: 'Open Sans' , sans-serif;
    font-size: 45px;
    font-weight: 600;
    text-align: center;
    color:rgb(16,54,103);
    margin-top: 5%;
    text-transform: uppercase;
    letter-spacing: 4px;
}
p.form-title
{
    font-family: 'Open Sans' , sans-serif;
    font-size: 30px;
    font-weight: 600;
    text-align: center;
    color:rgb(0,0,0);
    margin-top: 5%;
    text-transform: uppercase;
    letter-spacing: 4px;
}

form
{
    width: 300px;
    margin: 30px auto;
}

form.login input[type="text"], form.login input[type="password"]
{
    width: 100%;
    margin: 0;
    padding: 5px 10px;
    border-bottom: 1px solid #FFFFFF;
    font-style: italic;
    font-size: 12px;
    font-weight: 400;
    letter-spacing: 1px;
    margin-bottom: 5px;
    color: rgb(0,0,0);
}

form.login input[type="submit"]
{
    width: 100%;
    font-size: 14px;
    text-transform: uppercase;
    font-weight: 500;
    margin-top: 20px;
    outline: 0;
    cursor: pointer;
    letter-spacing: 1px;
}

form.login input[type="submit"]:hover
{
    transition: background-color 0.5s ease;
}

form.login .remember-forgot
{
    float: left;
    width: 100%;
    margin: 10px 0 0 0;
}
form.login .forgot-pass-content
{
    min-height: 20px;
    margin-top: 10px;
    margin-bottom: 10px;
}
form.login label, form.login a
{
    font-size: 12px;
    font-weight: 400;
    color: rgb(0,0,0);
}

form.login a
{
    transition: color 0.5s ease;
}

form.login a:hover
{
    color: #2ecc71;
}
.posted-by
{
    position: absolute;
    bottom: 26px;
    margin: 0 auto;
    color: #FFF;
    background-color: rgba(0, 0, 0, 0.66);
    padding: 10px;
    left: 45%;
}

    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="wrap">
            	<p class="brand-title">
                    ANH DUONG HOTEL</p>
            	<div class="col-md-4 col-md-offset-4">
            		<div class="panel panel-default" style="height: 270px";>
		                <form class="login" action ="" name="Login" method="POST" >
		                <p class="form-title">Sign In</p>
		                <form class="login" method="POST" >
						<input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
		                <input type="text" placeholder="Username" />
		                <input type="password" placeholder="Password" />
		                <input type="submit" value="Sign In" class="btn btn-success btn-sm" />
		                <div class="remember-forgot">
		                    <div class="row">
		                        <div class="col-md-6">
		                            <div class="checkbox">
		                                <label>
		                                    <input type="checkbox" />
		                                    Remember Me
		                                </label>
		                            </div>
		                        </div>
		                        
		                    </div>
		                </div>
		                </form>
						</form>
		            </div>
                </div>
            </div>
        </div>
    </div>
    <div class="posted-by">HOTEL : <a style="text-decoration: none;" href="{!! URL('/index') !!}">HOME</a></div>
</div>
</body>
</html>
