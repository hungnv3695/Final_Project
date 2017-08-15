<style type="text/css">
	.navbar-inverse {
		background-color:rgba(0, 0, 0, 0.8);
		opacity:0.9;
		border-radius:0;
		border:none;
	}		
	.navbar-inverse .navbar-nav .nav-link{
		color:#CCCCCC;
		font-size:16px;
		line-height:30px;
	}
	li{
		margin-right:50px;
		text-transform:uppercase;
		color:#CCCCCC;
	}
	.navbar-inverse .navbar-nav .nav-link:hover{
		color:#FFFFFF;
	}
	.login{		
		color:#CCCCCC;
		margin-top:18px;
		font-size:110%;
		margin-right:30px;
	}
	.login:hover{		
		color:#FFFFFF;
	}
	.logo{
		width:150px;
		height:150px;
		opacity:0.9;
		margin-left:60px;
	}
</style>
<div class="my-nav-container"style="position:fixed;">
	<nav class="navbar-toggleable-md navbar-inverse">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			</button>
			<a class="navbar-brand" href="#"><img class="logo" src="../img/LogoAnhDuong.jpg"/></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li><a class="nav-link" href="{!!url('/Home')  !!}">Trang chủ <span class="sr-only">(current)</span></a></li>
				<li><a class="nav-link" href="{!! url('/Room') !!}">Phòng</a></li>
				<li><a class="nav-link" href="{!! url('/Gallery') !!}">Ảnh</a></li>
			</ul>
			<a href="{!! url('/Login') !!}"><p class="login navbar-right">Đăng nhập</p></a>
		</div>
	</nav>
</div>