<style type="text/css">
	.bg-faded {
		width:100%;
		position:fixed;
		background-color:rgba(0, 0, 0, 0.8);
		opacity:0.9;
		border-radius:0;
		border:none;
		height:60px;
	}		
	.navbar-light .navbar-nav .nav-link {
		color:#CCCCCC;
		font-size:16px;
		line-height:30px;
		margin-left:9px;
		margin-right:41px;
		text-transform:uppercase;
	}
	.navbar-light .navbar-nav .nav-link:hover{
		color:#FFFFFF;
	}
	.login{		
		color:#CCCCCC;
		margin-top:18px;
		font-size:110%;
		margin-right:15px;
	}
	.login:hover{		
		color:#FFFFFF;
	}
</style>
<div class="my-nav-container"style="position:fixed;">
	<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
		<div class="navbar-header">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="#" style="margin-left:5px;">CompanyLogo</a>
		</div>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="nav navbar-nav">
				<li><a class="nav-link" href="#">Trang chủ <span class="sr-only">(current)</span></a></li>
				<li><a class="nav-link" href="#">Phòng</a></li>
				<li><a class="nav-link" href="#">Ảnh</a></li>
			</ul>
			<a href="{!! url('/K001/LogOut') !!}"><p class="login navbar-right">Đăng nhập</p></a>
		</div>
	</nav>
</div>