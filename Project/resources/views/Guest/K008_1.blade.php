<meta name="_token" content="{!! csrf_token() !!}"/>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ngha nghi</title>
	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset( '/plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css' )   }}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css' ) }}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/css/index.css')}}">
	<script type="text/javascript" src="{{ asset('/plugins/jquery/jquery-3.2.1.min.js') }}"></script>
	<script type="text/javascript" src="{{asset( '/plugins/bootstrap-3.3.7-dist/js/bootstrap.min.js' )}}"></script>
	<script type="text/javascript" src="{{ asset('/plugins/slide/jquery.slides.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/myPlugin.js') }}"></script>
</head>
</head>
<body>
	<div id="page">
	<header>
		<div class="my-nav-container">
			<div class="container">
				<nav class="navbar navbar-default my-nav">
					<div class="container-fluid">
						<div class="navbar-header height-navbar">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand subtract-padding" href="#">
								Company Logo
							</a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tiếng Việt <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">China</a></li>
										<li><a href="#">English</a></li>
										<li><a href="#">Japanese</a></li>
									</ul>
								</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="#">Trang chủ</a></li>
								<li><a href="#">Phòng</a></li>
								<li><a href="#">Ảnh</a></li>
								<li><a href="{!! url('/K001') !!}">Đăng nhập</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
				<div class="row">
					<div class="col-sm-4 col-sm-offset-8 book-container">
						<a href="book.blade.php"><button class="btn" id="btn-book">Book now</button></a>
					</div>
				</div>
			</div>
		</div>
		<div id="slides">
			<img class="img-responsive" src="{{ asset("/img/example-slide-4.jpg") }}">
			<img class="img-responsive" src="{{ asset("/img/example-slide-2.jpg") }}">
			<img class="img-responsive" src="{{ asset("/img/IMG_9828") }}">
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
					Chosen as the host for top international meetings and events, our hotel is the perfect venue in Hanoi for you to create memorable events. The Grand Ballroom can seat up to 420 banquet style. The Poolside Terrace is perfect for outdoor functions, and together with 13 private function rooms, offers superb facilities for any event. Our team of dedicated specialists is available to help you meticulously plan events of any scale.

Hanoi Daewoo Hotel features the largest room inventory in the city, with 411 tastefully decorated rooms and 34 suites. Each spacious room features a large window overlooking the city, swimming pool, or scenic Thu Le Lake.Chosen as the host for top international meetings and events, our hotel is the perfect venue in Hanoi for you to create memorable events. The Grand Ballroom can seat up to 420 banquet style. The Poolside Terrace is perfect for outdoor functions, and together with 13 private function rooms, offers superb facilities for any event. Our team of dedicated specialists is available to help you meticulously plan events of any scale.

Hanoi Daewoo Hotel features the largest room inventory in the city, with 411 tastefully decorated rooms and 34 suites. Each spacious room features a large window overlooking the city, swimming pool, or scenic Thu Le Lake.
				</p>
			</div>
			<div class="infomation">
				<hr class="style12">
				<button class="btn btn-infomation i1">Read more</button>
				<button class="btn btn-infomation i2" style="display: none">Close</button>
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
								<a href="restaurant.blade.php"><img src="{{ asset("/img/ai.jpg ") }}"/></a>
							</div>
						</div>
						<div class="col-sm-3 col-xs-6 sub-ct-col">
							<div class="sub-ct-col">
								<a href="#">Tours</a>
								<a href="#"><img src="{{ asset("/img/ab.jpg ") }}"/></a>
							</div>
						</div>
						<div class="col-sm-3 col-xs-6 sub-ct-col">
							<div class="sub-ct-col">
								<a href="#">Tours</a>
								<a href="#"><img src="{{ asset("/img/ab.jpg ") }}"/></a>
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
				<a href="#"><i class="fa fa-2x fa-facebook-square" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>
	<footer class="footer-distributed">

			<div class="footer-left">

				<h3>Company<span>logo</span></h3>

				<p class="footer-links">
					<a href="#">Home</a>
					·
					<a href="#">Blog</a>
					·
					<a href="#">Pricing</a>
					·
					<a href="#">About</a>
					·
					<a href="#">Faq</a>
					·
					<a href="#">Contact</a>
				</p>

				<p class="footer-company-name">Copyrigh &copy; Bản quyền thuộc về khách sạn Ánh Dương</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Khách sạn Ánh Dương, Tuần Châu, Hạ Long  </span> Quảng Ninh, Việt Nam</p>
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
					<span>About the company</span>
					Anh Duong Hotel is located on Tuan Chau Island, with 40 rooms, restaurants meet the needs ~ 200 guests, outdoor bar on the 6th floor of the hotel. In addition to accommodation services, dining and hotel services also have a boat trip to Halong Bay.
				</p>

				<div class="footer-icons">

					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>

				</div>

			</div>

		</footer>
	</div>
</body>
</html>


