<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src=" {!! asset('Scripts/FrontCheck/CheckError.js') !!}"></script>
    <style type="text/css">
    body{
        background:url({{asset( '/img/IMG_3151.JPG ' )}}) fixed;
		background-size: cover;
		padding: 0;
		margin: 0;
	}
	p.brand-title {
		font-family: 'Times New Roman',sans-serif;
		font-size: 40px;
		font-weight: 500;
		text-align: center;
		color:rgb(16,54,103);
		margin-top: 5%;
		text-transform: uppercase;
		letter-spacing: 4px;
	}
	.wrapper {
		margin-top: 50px;
		margin-bottom: 20px;
	}
	.login {
		max-width: 350px;
		padding: 20px 38px 50px;
		margin: 30px auto;
		background-color: #fff;
		border-radius:5px;
	}
	.login-heading{
		text-align:center;
		margin-bottom: 30px;
	}
	.form-control {
		position: relative;
		font-size: 16px;
		height: auto;
		padding: 10px;
	}
	input[type="text"] {
		border-bottom-left-radius: 0;
		border-bottom-right-radius: 0;
	}
	input[type="password"] {
		border-top-left-radius: 0;
		border-top-right-radius: 0;
	}
	.login .checkbox {
		margin-top:20px;
		margin-bottom:20px;
	}
	.login .checkbox.show:before {
		content: '\e013';
		color: #000000;
		font-size: 17px;
		margin: 1px 0 0 3px;
		position: absolute;
		pointer-events: none;
		font-family: 'Glyphicons Halflings';
	}
	.login .checkbox .character-checkbox {
		width: 25px;
		height: 25px;
		cursor: pointer;
		border-radius: 3px;
		border: 1px solid #ccc;
		vertical-align: middle;
		display: inline-block;
	}
	.login .checkbox .label {
		color: #6d6d6d;
		font-size: 13px;
		font-weight: normal;
	}
	.posted-by {
		position: absolute;
		bottom: 20px;
		margin: 0 auto;
		background-color: rgba(0,0,0,0.8);
		padding: 10px;
		left: 45%;
	}
	.posted-by a{
		font-family: 'Times New Roman',sans-serif;
		font-size: 17px;
		font-weight: 500;
		text-align: center;
		text-transform: uppercase;
	}
	.posted-by a:hover{
		color:#cccccc;
	}
	.colorgraph {
		height: 7px;
		border-top: 0;
		background: #c4e17f;
		border-radius: 5px;
		background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
		background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
		background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
		background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	}
    </style>
</head>
	<script>
			function showPassword() {			
				var key_attr = $('#key').attr('type');			
				if(key_attr != 'text') {				
					$('.checkbox').addClass('show');
					$('#key').attr('type', 'text');				
				} else {
					
					$('.checkbox').removeClass('show');
					$('#key').attr('type', 'password');
					
				}			
			}
	</script>
<body>
    <div class="container">
		<div class="row">
			<div class="wrapper">
				<p class="brand-title">Khách sạn Ánh Dương</p>
				<form action="" name="Login" method="POST" class="login">
					<h3 class="login-heading">Vui lòng đăng nhập</h3>
					<hr class="colorgraph"><br>
					<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
					<input type="text" class="form-control" name="userID" placeholder="Tên đăng nhập" size="30" value="{!! old('userID') !!}" oninvalid="InvalidMsg(this);" required/>
					<input type="password" id="key" class="form-control" name="password" placeholder="Mật khẩu" size="30" oninvalid="InvalidMsg(this);" required />
					<div class="Error">
						@if(Session::has('LoginErroMsg'))
						<p style="color:red;">{!! Session::get('LoginErroMsg') !!} </p>
						@endif
					</div>
					<div class="row checkbox">
						<span class="character-checkbox" onclick="showPassword()"></span>
						<span class="label">Hiển thị mật khẩu</span>
					</div>
					<input type="submit" value="Đăng nhập" class="btn btn-lg btn-primary btn-block" />
				</form>
			</div>
			<div class="posted-by"><a style="text-decoration: none;" href="{!! URL('/') !!}">TRANG CHỦ</a></div>
		</div>
    </div>
</body>

</html>