<meta name="_token" content="{!! csrf_token() !!}"/>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Khách sạn Ánh Dương</title>
	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset( '/plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css' )   }}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css' ) }}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href=" {!! asset('css/index.css') !!}">
	<script type="text/javascript" src="{{ asset('/plugins/jquery/jquery-3.2.1.min.js') }}"></script>
	<script type="text/javascript" src="{{asset( '/plugins/bootstrap-3.3.7-dist/js/bootstrap.min.js' )}}"></script>
	<script type="text/javascript" src="{{ asset('/plugins/slide/jquery.slides.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/myPlugin.js') }}"></script>
	<style type="text/css">
	body
	{
		padding: 0;
		margin: 0;
	}
	.navbar-inverse{
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
	</style>
</head>
<body>
	<div id="page">
		<header>
			<div class="my-nav-container"style="position:fixed;">
					<nav class="navbar navbar-inverse">
						<div class="container-fluid">
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
									<li><a class="nav-link" href="#">Trang chủ <span class="sr-only">(current)</span></a></li>
									<li><a class="nav-link" href="#">Phòng</a></li>
									<li><a class="nav-link" href="#">Ảnh</a></li>
								</ul>
								<a href="{!! url('/Login') !!}"><p class="login navbar-right">Đăng nhập</p></a>
							</div>
						</div>
					</nav>
					<div class="row">
						<div class="col-sm-4 col-sm-offset-8 book-container">
							<button  type="button" class="btn" id="btn-book" onclick="window.location='{{ url("/book") }}'" >Book Now</button>
						</div>
					</div>
			</div>
			<div id="slides">
				<img class="img-responsive" src="{{ asset("/img/Head01.jpg") }}">
				<img class="img-responsive" src="{{ asset("/img/Head02.jpg") }}">
				<img class="img-responsive" src="{{ asset("/img/Head03.jpg") }}">
				<a id="scrollTo" href="#" class="slidesjs-next slidesjs-navigation slides-center"><i class="fa fa-2x fa-arrow-circle-down" aria-hidden="true"></i></a>
				
				<a href="#" class="slidesjs-previous slidesjs-navigation slides-left"><i class="fa fa-3x fa-angle-left" aria-hidden="true"></i></a>
				<a href="#" class="slidesjs-next slidesjs-navigation slides-right"><i class="fa fa-3x fa-angle-right" aria-hidden="true"></i></a>
			</div>
			<!-- script de scroll -->
				<script type="text/javascript">
					$("#scrollTo").click(function() {
						var targetDiv = $(this).attr('href');
						$('html, body').animate({
							scrollTop: $("#content").offset().top
						}, 1000);
					});
				</script>
			<!-- END -->
			<!-- xu ly phan slide anh -->
				<script type="text/javascript">
					$('#slides').slidesjs({
						width: 940,
						height: 528,
						navigation: {
							active: false,
						},
						pagination: {
							active: false,
						},
						start: 1,
						play: {
							restartDelay: 5000,
							auto: true,
							effect: "fade",
							swap: true,
							interval: 5000
						}
					});
					function fixSlides(){
						$('.slidesjs-container').css("height",$('.slidesjs-container img').css("height"));
						$('.slides-center').css("width", parseInt($('.slidesjs-container img').css("width")) + 'px');

					}
					$( document ).ready(function() {
						fixSlides();
					});
					$( window ).resize(function() {
						fixSlides();

					});
				</script>
			<!--END-->
		</header>
		<div id="content">
			<article>
				<div style="display: none;">
					<p id="infomation-text">
						Khách sạn Ánh Dương tọa lạc tại phường Tuần Châu thuộc thành phố Hạ Long, cách trung tâm thương mại Vincom Plaza Hạ Long 11 km, cách bãi biển 12 phút đi bộ. Bảo tàng Quảng Ninh nằm trong bán kính 12 km từ khách sạn Ánh Dương, trong khi trung tâm thương mại Hạ Long Marine Plaza cách chỗ nghỉ 5 km. Sân bay quốc tế Cát Bi cách đó 29 km.Khách sạn Ánh Dương có nhà hàng riêng nằm trong khuôn viên nơi nghỉ để phục vụ du khách. Phòng nghỉ ở đây có TV màn hình phẳng. Một số phòng cho tầm nhìn ra quang cảnh biển hoặc thành phố. Các phòng còn đi kèm phòng tắm riêng với bồn tắm/vòi sen, dép, đồ vệ sinh cá nhân miễn phí và máy sấy tóc. Du khách có thể sử dụng Wi-Fi miễn phí tại khách sạn.
					</p>
				</div>
				<div class="infomation">
					<hr class="style12">
					<button class="btn btn-infomation i1">Về chúng tôi</button>
					<button class="btn btn-infomation i2" style="display: none">Đóng</button>
				</div>
				<div  style="margin: 25px 0 25px 0;" >
					<div id="more" class="container">
						<div class="row sub-ct-container">
							<div class="col-sm-3 col-xs-6">
								<div class="sub-ct-col">
									<a href="#">Phòng ở</a>
									<a href="#"> <img src='{{ asset("/img/tt.jpg ") }}' /> </a>
								</div>
							</div>
							<div class="col-sm-3 col-xs-6 sub-ct-col">
								<div class="sub-ct-col">
									<a href="restaurant.blade.php">Ẩm Thực</a>
									<a href="restaurant.blade.php"><img src="{{ asset("/img/Restaurant-4.jpg ") }}"/></a>
								</div>
							</div>
							<div class="col-sm-3 col-xs-6 sub-ct-col">
								<div class="sub-ct-col">
									<a href="#">Dịch vụ</a>
									<a href="#"><img src="{{ asset("/img/View-bien-1.jpg ") }}"/></a>
								</div>
							</div>
							<div class="col-sm-3 col-xs-6 sub-ct-col">
								<div class="sub-ct-col">
									<a href="#">Ảnh</a>
									<a href="#"><img src="{{ asset("/img/Anh-Duong-hotel.jpg ") }}"/></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--script xu ly dong mo thong tin -->
					<script type="text/javascript">
						$( document ).ready(function() {
							$('.btn-infomation').click(function(){
								if($('.i1').css('display') != 'none'){
									myPlugin.showInfo();
									$('.i1').css('display','none');
									$('.i2').css('display','inline-block');
								}else{
									myPlugin.closeInfo();
									$('.i1').css('display','inline-block');
									$('.i2').css('display','none');
								}
							});
						});
					</script>
				<!-- End-->
			</article>
			<div class="social-bar">
				<div class="container">
					<a href="#"><i class="fa fa-2x fa-instagram" aria-hidden="true"></i></a>
					<a href="https://www.facebook.com/Kh%C3%A1ch-s%E1%BA%A1n-%C3%81nh-D%C6%B0%C6%A1ng-783173898529890/?hc_ref=ARQzOvF4ulUbYyC1fzXI-ioafOl4ovp52nwyddRyCbXKmVeaWW2YLcd1poIsx-1TDUg"><i class="fa fa-2x fa-facebook-square" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
		<footer class="footer-distributed">

			<div class="footer-left">
				<img src="{{ asset('img/map.jpg') }}"/>
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
</body>
</html>


