<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Dịch vụ</title>
	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="plugins/animate/animate.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="plugins/slide/jquery.slides.min.js"></script>
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
		h3{
			color:rgb(140, 110, 78);
		}
		table, tbody, thead, tr, td, strong{
			font-family: 'Enriqueta', arial, serif !important;
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
                            <li><a class="nav-link" href="#">Trang chủ <span class="sr-only">(current)</span></a>
                            </li>
                            <li><a class="nav-link" href="#">Phòng</a>
                            </li>
                            <li><a class="nav-link" href="#">Ảnh</a>
                            </li>
                        </ul>
                        <a href="{!! url('/K001/LogOut') !!}">
                            <p class="login navbar-right">Đăng nhập</p>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="bg"></div>
    </header>
    <div id="content">
        <div class="container-fluid">
            <h3 class="col-md-offset-1">Các dịch vụ quanh khách sạn</h3>
            <div class="col-md-10 col-md-offset-1" style="margin-top:20px;">
                <table class="table">
                    <tbody>
                        <tr class="row1" style="border:0;">
                            <td class="column-1"><strong>Các địa danh nổi tiếng nhất</strong>
                            </td>
                            <td class="column-2"><strong>Khoảng cách</strong>
                            </td>
                            <td class="column-3"><strong>Nhà hàng và chợ</strong>
                            </td>
                            <td class="column-4"><strong>Khoảng cách</strong>
                            </td>
                        </tr>
                        <tr class="row2">
                            <td class="column-1">Heavenly Palace Cave</td>
                            <td class="column-2">3,4 km</td>
                            <td class="column-3">Karaoke Q7</td>
                            <td class="column-4">0,2 km</td>
                        </tr>
                        <tr class="row3">
                            <td class="column-1">Dau Go Cave</td>
                            <td class="column-2">3,8 km</td>
                            <td class="column-3">Siêu thị</td>
                            <td class="column-4">0,2 km</td>
                        </tr>
                        <tr class="row4">
                            <td class="column-1">Tổ hợp Thương mại và Giải trí Halong Marine</td>
                            <td class="column-2">5,1 km</td>
                            <td class="column-3">Nhà hàng Cua Vàng</td>
                            <td class="column-4">0,3 km</td>
                        </tr>
                        <tr class="row5">
                            <td class="column-1">Chợ đêm Hạ Long</td>
                            <td class="column-2">7,7 km</td>
                            <td class="column-3"></td>
                            <td class="column-4"></td>
                        </tr>
                        <tr class="row6">
                            <td class="column-1">Khu Du lịch Giải trí Sun World Hạ Long</td>
                            <td class="column-2">7,8 km</td>
                            <td class="column-3"><strong>Cảnh đẹp thiên nhiên</strong>
                            </td>
                            <td class="column-4"></td>
                        </tr>
                        <tr class="row7">
                            <td class="column-1">Trung tâm thương mại Vincom Hạ Long</td>
                            <td class="column-2">10,9 km</td>
                            <td class="column-3">Hạ Long</td>
                            <td class="column-4">0 km</td>
                        </tr>
                        <tr class="row8">
                            <td class="column-1">Ti Top Island</td>
                            <td class="column-2">11,9 km</td>
                            <td class="column-3"></td>
                            <td class="column-4"></td>
                        </tr>
                        <tr class="row9">
                            <td class="column-1">Quang Ninh Museum</td>
                            <td class="column-2">12,1 km</td>
                            <td class="column-3"><strong>Các bãi biển trong khu vực</strong>
                            </td>
                            <td class="column-4"></td>
                        </tr>
                        <tr class="row10">
                            <td class="column-1">Soi Sim Island</td>
                            <td class="column-2">12,1 km</td>
                            <td class="column-3">Bãi biển Tuần Châu</td>
                            <td class="column-4">1 km</td>
                        </tr>
                        <tr class="row11">
                            <td class="column-1">Sung Sot Cave</td>
                            <td class="column-2">13,8 km</td>
                            <td class="column-3"></td>
                            <td class="column-4"></td>
                        </tr>
                        <tr class="row12">
                            <td class="column-1">Cat Ba National Park</td>
                            <td class="column-2">14,2 km</td>
                            <td class="column-3"><strong>Các sân bay gần nhất</strong>
                            </td>
                            <td class="column-4"></td>
                        </tr>
                        <tr class="row13">
                            <td class="column-1">Hospital Cave</td>
                            <td class="column-2">17 km</td>
                            <td class="column-3">Sân bay Quốc tế Cát Bi</td>
                            <td class="column-4">29 km</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
		<div class="container-fluid" style="margin-bottom:10px;">
			<h3 class="col-md-offset-1">Trong khuôn viên khách sạn</h3>
			<div class="col-md-10 col-md-offset-1">
				<h3>Nhà hàng</h3>
				<p class="menu-type restaurant-feature"><span class="title">Thực đơn:</span>&nbsp;Tự chọn &amp; gọi món</p>
				<p class="cuisines restaurant-feature"><span class="title">Ẩm thực:</span>&nbsp;Món Mỹ, Món Anh, Món Hàn Quốc, Món Việt Nam, Món Châu Á, Quốc tế</p>
				<p class="open-for restaurant-feature"><span class="title">Mở cửa phục vụ:</span>&nbsp;Bữa sáng, Bữa trưa, Bữa tối</p>
			</div>
		</div>
		<div class="social-bar">
			<div class="container">
				<a href="#"><i class="fa fa-2x fa-instagram" aria-hidden="true"></i></a>
				<a href="https://www.facebook.com/Kh%C3%A1ch-s%E1%BA%A1n-%C3%81nh-D%C6%B0%C6%A1ng-783173898529890/?hc_ref=ARQzOvF4ulUbYyC1fzXI-ioafOl4ovp52nwyddRyCbXKmVeaWW2YLcd1poIsx-1TDUg"><i class="fa fa-2x fa-facebook-square" aria-hidden="true"></i></a>
			</div>
		</div>
    </div>
    <!--footer-->
    <div class="col-md-12">
        <div class="row">
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