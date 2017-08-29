<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Ẩm thực</title>
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') !!} ">
    <link rel="stylesheet" type="text/css" href="{!! asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') !!} ">
    <link rel="stylesheet" type="text/css" href="{!! asset('plugins/animate/animate.css') !!}">
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
        
        #myCarousel {
            width: 100%;
        }
        .page-title {
            display: inline-block;
            margin-top: 20px;
            width: auto;
            margin-left: 50px;
        }
        
        .page-title h4 {
            float: left;
            color: rgb(140, 110, 78);
            margin-right: 10px;
        }
        
        h4.home-page:hover {
            color: #BD6B09;
        }
        
        .Cuisine-item {
            margin: 20px 0 70px;
        }
        
        .zoom-img {
            overflow: hidden;
        }
        
        .zoom-img img {
            padding: 5px;
            border: 1px solid rgba(140, 110, 78, 0.5);
            width: 100%;
            transition: all 0.2s ease-in-out;
        }
        
        .zoom-img:hover img {
            transform: scale(1.2);
        }
        
        h3 {
            text-transform: uppercase;
            color: rgb(140, 110, 78);
        }
        
        .bar-infor {
            display: block;
            line-height: 30px;
            font-size: 16px;
            margin-top: 30px;
        }
        
        .open-time {
            display: block;
            color: rgb(140, 110, 78);
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div id="page">
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
                            <a class="navbar-brand" href="http://anhduonghotel.herokuapp.com/"><img class="logo" src="img/LogoAnhDuong.jpg" />
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
                        <img src="img/Cuisine3.jpg" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="img/Cuisine2.jpg" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="img/Cuisine7.jpg" style="width:100%;">
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
        </header>
        <div id="content">
            <div class="page-title">
                <a href="{!! url('/Home') !!}"><h4 class="home-page">Trang chủ</h4></a>
                <h4>> Ẩm thực</h4>
            </div>
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="col-md-4 Cuisine-item">
                        <div class="zoom-img"><img src="img/Cuisine6.jpg">
                    </div>
                    </div>
                    <div class="col-md-8">
                        <h3>Anh Duong Restaurant</h3>
                        <p class="bar-infor">
                            Nằm dưới tầng 1 của khách sạn, phục vụ ăn uống và lễ tiệc, cưới hỏi. Nhà hàng Ánh Dương là một không gian thơ mộng và đẹp mắt, nằm cạnh ngay bờ biển sẽ đem đến cho quý khách một cảm giác thật ấn tượng. Hãy thưởng thức những bữa ăn tuyệt vời tại nhà hàng Ánh Dương với những món ăn hải sản,rừng núi mang phong cách ẩm thực Á-Âu. Đặc biệt có phục vụ tiệc buffet vào mỗi buổi sáng.
                        </p>
                        <span class="open-time" style="margin-top:70px;">Giờ mở cửa: từ 6:00 AM đến 9:00 PM</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4 Cuisine-item">
                        <div class="zoom-img"><img src="img/bar4.jpg">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3>Anh Duong bar</h3>
                        <p class="bar-infor">
                            Nằm trên tầng 7 của khách sạn, phục vụ coffee và những thức uống tuyệt hạng từ những bartender chuyên nghiệp. Quầy bar Ánh Dương, một địa điểm lý tưởng mà quý khách có thể thưởng thức những đồ uống, bia, rượu trong một không gian hoàn toàn thư giãn và thoải mái.
                        </p>
                        <span class="open-time" style="margin-top:100px;">Giờ mở cửa: từ 6:00 AM đến 12:00 PM</span>
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
        <!--footer-->
        <div class="col-md-12">
            <div class="row">
                <footer class="footer-distributed">

                    <div class="footer-left">
                        <img src="img/map.jpg" />
                        <p class="footer-links">
                            <a href="http://anhduonghotel.herokuapp.com/">Trang chủ</a> ·
                            <a href="#"> Blog</a> ·
                            <a href="#"> Liên hệ</a>
                        </p>
                        <p class="footer-company-name">Copyrigh &copy; Bản quyền thuộc về khách sạn Ánh Dương</p>
                    </div>

                    <div class="footer-center">

                        <div>
                            <i class="fa fa-map-marker"></i>
                            <p>Khách sạn Ánh Dương, Tuần Châu, Hạ Long,
                                <br>Quảng Ninh, Việt Nam</p>
                        </div>

                        <div>
                            <i class="fa fa-phone"></i>
                            <p>01662451994</p>
                        </div>

                        <div>
                            <i class="fa fa-envelope"></i>
                            <p><a href="http://anhduonghotel.herokuapp.com/">anhduonghotel.herokuapp.com</a>
                            </p>
                        </div>

                    </div>

                    <div class="footer-right">

                        <p class="footer-company-about">
                            <span>Về chúng tôi</span> Khách sạn Ánh Dương tọa lạc tại phường Tuần Châu thuộc thành phố Hạ Long, cách trung tâm thương mại Vincom Plaza Hạ Long 11 km, cách bãi biển 12 phút đi bộ. Bảo tàng Quảng Ninh nằm trong bán kính 12 km từ khách sạn Ánh Dương, trong khi trung tâm thương mại Hạ Long Marine Plaza cách chỗ nghỉ 5 km. Sân bay quốc tế Cát Bi cách đó 29 km.
                        </p>

                    </div>

                </footer>
            </div>
        </div>
    </div>
</body>

</html>