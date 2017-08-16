<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Phòng ở</title>
	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{!! asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') !!} ">
	<link rel="stylesheet" type="text/css" href="{!! asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') !!} ">
	<link rel="stylesheet" type="text/css" href="{!! asset('plugins/animate/animate.css') !!} ">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
	<link rel="stylesheet" type="text/css" href="{!! asset('css/index.css') !!} ">
	<script type="text/javascript" src="{!! asset('plugins/slide/jquery.slides.min.js') !!} "></script>
    <style type="text/css">
		body
		{
			padding: 0;
			margin: 0;
		}
		.navbar-inverse{
			width:100%;
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
			margin-right:30px;
			text-transform:uppercase;
			color:#CCCCCC;
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
		.logo{
			width:150px;
			height:150px;
			opacity:0.9;
			margin-left:60px;
		}
		.bg {
			width: 100%;
			height: 300px;
			background: url('img/Head02.jpg') fixed;
		}
		.page-title{
			display:inline-block;
			margin-top:20px;
			width:auto;
			margin-left: 50px;
		}
        .page-title h4 {
			float:left;
            color: rgb(140, 110, 78);
            margin-right: 10px;
        }
		h4.home-page:hover {
			color:#BD6B09;
        }
		h3.main-slogan{
			color:rgb(140, 110, 78);
			margin-left: 50px;
		}
		.room-introduce{
			width:auto;
			margin-left: 50px;
		}
		.room-item{
			margin:20px 0 70px;
		}
		.zoom-img{
			overflow:hidden;
			position: relative;
		}
		.zoom-img img{
			display: block;
			width: 100%;
			height: auto;
			transition:all 0.2s ease-in-out; 
		}
		.room-detail{
			background:rgb(140, 110, 78);
			color: #cccccc;
			height:30px;
			line-height:28px;
			border:none;
			border-bottom-left-radius:5px;
			border-bottom-right-radius:5px;
		}
		.room-detail:hover{
			color:#ffffff;
		}
		.text-intro{
			margin:10px 0;
		}
		h3.roomtype{
			color:rgb(140, 110, 78);
			text-align:center;
		}
		.item-price{
			display:block;
			padding:0px 7px 0px 7px;
			float:left;
			line-height:40px;
			height:40px;
			background:rgba(140, 110, 78, 0.3);
			font-size:14px;
			color: #2a2a2a;
		}
		a.booking{
			display:block;
			float:left;
			padding:0px 7px 0px 7px;
			background:rgb(140, 110, 78);
			text-decoration:none;
			line-height:40px;
			height:40px;
			font-family: 'Enriqueta', arial, serif !important;
			font-weight:100;
			font-size:18px;
			color: #ffffff;
		}
		a.booking:hover{
			background:#D2691E;
		}		
	</style>
</head>
<body>
<div class="page">
    <header>
        <div class="my-nav-container" style="position:fixed;">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><img class="logo" src="img/LogoAnhDuong.jpg" />
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li><a class="nav-link" href="{!! url('/Home') !!}">Trang chủ <span class="sr-only">(current)</span></a>
                            </li>
                            <li><a class="nav-link" href="{!! url('/Room') !!}">Phòng</a>
                            </li>
                            <li><a class="nav-link" href="{!! url('/Gallery') !!}">Ảnh</a>
                            </li>
                        </ul>
                        <a href="{!! url('/Login') !!}">
                            <p class="login navbar-right">Đăng nhập</p>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="bg"></div>
    </header>
    <div id="content">
        <div class="page-title">
			<a href="{!! url('/Home') !!}"><h4 class="home-page">Trang chủ</h4></a>
			<h4>> Phòng</h4> 
		</div>
		<h3 class="main-slogan">Phòng ở thượng hạng tại khách sạn Ánh Dương</h3>
		<p class="room-introduce">
			Khách sạn Ánh Dương cung cấp 40 phòng nghỉ rộng rãi và tiện nghi, được trang trí rất bài bản chuyên nghiệp với nội thất cao cấp.
			Trang thiết bị và dịch vụ đáp ứng với mọi nhu cầu <br>của từng khách hàng nhằm mang lại một kì nghỉ thư giãn, thoải mái và trải nghiệm khó quên.
		</p>
		<div class="container-fluid">
			<div class="col-md-12">
				<div class="col-md-3 col-xs-6 room-item">
					<div class="zoom-img">
						<img src="img/single.jpg">
						<button type="button" class="room-detail" data-toggle="collapse" data-target="#intro1">Chi tiết phòng</button>
						<div id="intro1" class="text-intro collapse">
							Kiểu phòng có 1 giường đơn thông thường. Với đầy đủ các trang thiết bị cần thiết bị và phòng tắm riêng. Phù hợp với 1 khách hàng sử dụng.	.
						</div>
					</div>					
					<h3 class="roomtype">Phòng single</h3>
					<div class="form-inline">
						<span class="item-price">Giá chỉ 100.000 VNĐ/đêm</span>
						<a class="booking" href="#">Đặt ngay</a>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 room-item">				
					<div class="zoom-img">
						<img src="img/double.jpg">
						<button type="button" class="room-detail" data-toggle="collapse" data-target="#intro2">Chi tiết phòng</button>
						<div id="intro2" class="text-intro collapse">
							Kiểu phòng có 1 giường đơn lớn. Với đầy đủ các trang thiết bị cần thiết bị và phòng tắm riêng. Thông thường dành cho những cặp vợ chồng hoặc dành cho những người có thể nằm chung với nhau.
						</div>
					</div>
					<h3 class="roomtype">Phòng double</h3>
					<div class="form-inline">
						<span class="item-price">Giá chỉ 200.000 VNĐ/đêm</span>
						<a class="booking" href="#">Đặt ngay</a>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 room-item">
					<div class="zoom-img">
						<img src="img/twins.jpg">
						<button type="button" class="room-detail" data-toggle="collapse" data-target="#intro3">Chi tiết phòng</button>
						<div id="intro3" class="text-intro collapse">
							Kiểu phòng có 2 giường đơn thông thường. Với đầy đủ các trang thiết bị cần thiết bị và phòng tắm riêng.  Thông thường dành cho những khách không ngủ chung giường với nhau.
						</div>
					</div>	
					<h3 class="roomtype">Phòng twins</h3>
					<div class="form-inline">
						<span class="item-price">Giá chỉ 300.000 VNĐ/đêm</span>
						<a class="booking" href="#">Đặt ngay</a>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 room-item">
					<div class="zoom-img">
						<img src="img/extra.jpg">
						<button type="button" class="room-detail" data-toggle="collapse" data-target="#intro4">Chi tiết phòng</button>
						<div id="intro4" class="text-intro collapse">
							Kiểu phòng có 1 giường đơn cỡ lớn và 1 giường phụ bé bên cạnh được thiết kế nhỏ, gọn, nhẹ, để linh động di chuyển và xử lý. Với đầy đủ các trang thiết bị cần thiết bị và phòng tắm riêng.  Thông thường dành cho gia đình có con nhỏ.
						</div>
					</div>	
					<h3 class="roomtype">Phòng extra</h3>
					<div class="form-inline">
						<span class="item-price">Giá chỉ 400.000 VNĐ/đêm</span>
						<a class="booking" href="#">Đặt ngay</a>
					</div>
				</div>
			</div>
		</div>
		<div class="social-bar">
			<div class="container">
				<a href="#"><i class="fa fa-2x fa-instagram" aria-hidden="true"></i></a>
				<a href="https://www.facebook.com/Kh%C3%A1ch-s%E1%BA%A1n-%C3%81nh-D%C6%B0%C6%A1ng-783173898529890/?hc_ref=ARQzOvF4ulUbYyC1fzXI-ioafOl4ovp52nwyddRyCbXKmVeaWW2YLcd1poIsx-1TDUg"><i class="fa fa-2x fa-facebook-square" aria-hidden="true"></i></a>
			</div>
		</div>
    </div>
    <footer class="footer-distributed">

			<div class="footer-left">
				<img src="img/map.jpg"/>
				<p class="footer-links">
					<a href="#">Trang chủ</a>
					·
					<a href="#"> Blog</a>
					·
					<a href="#"> Liên hệ</a>	
				</p>
				<p class="footer-company-name">Copyrigh &copy; Bản quyền thuộc về khách sạn Ánh Dương</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p>Khách sạn Ánh Dương, Tuần Châu, Hạ Long, <br>Quảng Ninh, Việt Nam</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>01662451994</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="#">anhduonghotel.com.vn</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>Về chúng tôi</span>
					Khách sạn Ánh Dương tọa lạc tại phường Tuần Châu thuộc thành phố Hạ Long, cách trung tâm thương mại Vincom Plaza Hạ Long 11 km, cách bãi biển 12 phút đi bộ. Bảo tàng Quảng Ninh nằm trong bán kính 12 km từ khách sạn Ánh Dương, trong khi trung tâm thương mại Hạ Long Marine Plaza cách chỗ nghỉ 5 km. Sân bay quốc tế Cát Bi cách đó 29 km.
				</p>

			</div>

		</footer>
        </div>
    </div>
</div>
</body>
</html>