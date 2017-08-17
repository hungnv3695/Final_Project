<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Thư viện ảnh</title>
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') !!} ">
    <link rel="stylesheet" type="text/css" href="{!! asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') !!} ">
    <link rel="stylesheet" type="text/css" href="{!! asset('plugins/animate/animate.css') !!} ">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{!! asset('css/index.css') !!} ">
    <script type="text/javascript" src="{!! asset('plugins/slide/jquery.slides.min.js') !!} "></script>
    <style type="text/css">
        body {
            padding: 0;
            margin: 0;
        }
        
        .navbar-inverse {
            width: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            opacity: 0.9;
            border-radius: 0;
            border: none;
        }
        
        .navbar-inverse .navbar-nav .nav-link {
            color: #CCCCCC;
            font-size: 16px;
            line-height: 30px;
        }
        
        li {
            margin-right: 30px;
            text-transform: uppercase;
            color: #CCCCCC;
        }
        
        .login {
            color: #CCCCCC;
            margin-top: 18px;
            font-size: 110%;
            margin-right: 15px;
        }
        
        .login:hover {
            color: #FFFFFF;
        }
        
        .logo {
            width: 150px;
            height: 150px;
            opacity: 0.9;
            margin-left: 60px;
        }
        
        .photo-title {
            margin-top: 0;
            height: 215px;
            background: url('img/photobg.jpg') fixed;
            opacity: 0.3;
            border: none;
        }
        
        h3 {
            font-family: 'Enriqueta', arial, serif !important;
            color: rgb(140, 110, 78);
            margin-left: 70px;
        }
        
        #myCarousel{
            width: 90%;
            margin: 20px 5% 20px;
        }
    </style>
</head>

<body>
    <div class="page">
        <!--header-->
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
        </header>
        <!--body-->
        <div id="content">
            <div align="center" class="photo-title"></div>
            <h3>Thư viện ảnh</h3>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="img/bg2.jpg" style="width:100%;">
                        </div>

                        <div class="item">
                            <img src="img/Restaurant-4.jpg" style="width:100%;">
                        </div>

                        <div class="item">
                            <img src="img/Photo2.jpg" style="width:100%;">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            <!--END-->
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