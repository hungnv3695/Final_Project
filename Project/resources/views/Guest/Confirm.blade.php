<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Xác nhận đặt phòng</title>
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset( '/plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css' )   }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css' ) }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/plugins/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href=" {!! asset('css/index.css') !!}">
    <script type="text/javascript" src="{{ asset('/plugins/jquery/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{asset( '/plugins/bootstrap-3.3.7-dist/js/bootstrap.min.js' )}}"></script>
    <script type="text/javascript" src="{{ asset('/plugins/slide/jquery.slides.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/myPlugin.js') }}"></script>
    <script type="text/ecmascript" src="{{asset('jqgrid/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{!! asset('Scripts/FrontCheck/CheckError.js') !!}">
    </script>
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
        
        .bg {
            width: 100%;
            height: 300px;
            background: url('../img/Head02.jpg') fixed;
        }
        
        .reservation-title {
            height: 50px;
            background: rgb(140, 110, 78);
        }
        
        .reservation-title h4 {
            line-height: 35px;
            margin-left: 20px;
            font-weight: bold;
            color: #ffffff;
        }
        
        .label1 {
            color: gray;
            text-align: right;
        }
        
        .label2 {
            text-align: left;
        }
        
        .label3 {
            width: 100px;
            text-align: right;
        }
        
        .booking {
            background: rgb(140, 110, 78);
            color: #fff;
            height: 35px;
            font-size: 15px;
            border-radius: 5px;
            border: none;
        }
        
        .booking:hover {
            background: rgb(34, 34, 34);
            color: #fff;
        }
    </style>
</head>

<body>
    <form id="myForm">
        <div class="page">
            <!--header-->
            <header>
                <nav class="navbar navbar-inverse" style="position:fixed;">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#"><img class="logo" src="../img/LogoAnhDuong.jpg" />
                            </a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav">
                                <li><a class="nav-link" href="{!! url('/Home') !!}">Trang chủ <span class="sr-only">(current)</span></a>
                                </li>
                                <li><a class="nav-link" href="{!! url('/Room') !!}">Phòng</a>
                                </li>
                                <li><a class="nav-link" href="{!! url('/Cuisine') !!}">Ảnh</a>
                                </li>
                            </ul>
                            <a href="{!! url('/Login') !!}">
                                <p class="login navbar-right">Đăng nhập</p>
                            </a>
                        </div>
                    </div>
                </nav>
                <div class="bg"></div>
            </header>
            <!--body-->
            <div id="content">
                <h3 align="center" style="color:rgb(140, 110, 78);"><b>Xác nhận đặt phòng</b></h3>
                <div class="container-fluid">
                    <div class="row reservation-title">
                        <h4>Thông tin đặt phòng - from <span id="spCheckin">...</span> to <span id="spCheckout">...</span></h4>
                    </div>
                    <div class="row" style="border-bottom:1px solid rgb(220,220,220);">
                        <div class="col-md-7">
                            <div class="form-inline">
                                <h4 style="color:rgb(140, 110, 78);"><b>ANH DUONG HOTEL</b></h4>
                            </div>
                            <div class="col-md-3 form-horizontal">
                                <div class="form-group">
                                    <label class="label1">Địa chỉ</label>
                                </div>
                                <div class="form-group">
                                    <label class="label1">Thời gian mở cửa</label>
                                </div>
                                <div class="form-group">
                                    <label class="label1">Nhận phòng từ</label>
                                </div>
                                <div class="form-group">
                                    <label class="label1">Trả phòng trước</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="label2">Đảo Tuần Châu, Hạ Long, Việt Nam</label>
                                </div>
                                <div class="form-group">
                                    <label class="label2">24/7</label>
                                </div>
                                <div class="form-group">
                                    <label class="label2">13:00</label>
                                </div>
                                <div class="form-group">
                                    <label class="label2">12:00</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="border-bottom:1px solid rgb(220,220,220);margin-bottom:20px;">
                        <div class="col-md-6">
                            <div class="col-md-12" style="border:2px solid rgb(240,240,240);margin-top:10px;margin-bottom:10px;">
                                <div class="col-md-12" style="margin-top:10px;">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="font-size:120%;color:rgb(140, 110, 78);"><b>Kiểu phòng</b>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="font-size:120%;color:rgb(140, 110, 78);"><b>Số lượng (Phòng)</b>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="font-size:120%;color:rgb(140, 110, 78);"><b>Giá (VNĐ) </b>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="BookInfor">

                                </div>
                                <div class="col-md-12" style="margin-top:30px;">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="font-size:120%;color:rgb(140, 110, 78);"><b>Tiền phòng</b>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-md-offset-4">
                                        <div class="form-group">
                                            <label id="roomPrice"><b>$2</b>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><b>Số đêm</b>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-md-offset-4">
                                        <div class="form-group">
                                            <label id="nights"><b></b>
                                            </label>
                                            <label><b> (đêm)</b>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><b>VAT (10%)</b>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-md-offset-4">
                                        <div class="form-group">
                                            <label id="lbVAT"><b></b>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top:10px;margin-bottom:49px;">
                                    <div class="col-md-4 col-md-offset-4">
                                        <div class="form-group">
                                            <label style="font-size:120%;color:rgb(140, 110, 78);"><b>Tổng tiền là:</b>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label id="Total"><b></b>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12" style="border:2px solid rgb(240,240,240);margin-top:10px;margin-bottom:10px;">
                                <label style="font-size:120%;color:rgb(140, 110, 78);margin-top:10px;"><b>Thông tin khách</b>
                                </label>
                                <div class="form-inline col-md-offset-1" style="margin-top:10px;">
                                    <label class="label3" for="">Họ tên: </label>
                                    <input id="txtFullname" name="txtFullname" type="text" class="form-control input-md" size="25" maxlength="50" oninvalid="InvalidMsg(this);" required>
                                </div>
                                <div class="form-inline col-md-offset-1" style="margin-top:15px;">
                                    <label class="label3" for="">Email: </label>
                                    <input id="txtEmail" name="txtEmail" type="text" class="form-control input-md" size="25" maxlength="50">
                                </div>
                                <div class="form-inline col-md-offset-1" style="margin-top:15px;">
                                    <label class="label3" for="">Điện thoại: </label>
                                    <input id="txtPhone" name="txtPhone" type="text" class="form-control input-md" size="25" maxlength="20">
                                </div>
                                <div class="form-inline col-md-offset-1" style="margin-top:15px;">
                                    <label class="label3" for="">CMND: </label>
                                    <input id="txtIdcard" name="txtIdcard" type="text" class="form-control input-md" size="25" maxlength="12">
                                </div>
                                <div class="form-inline col-md-offset-1" style="margin-top:15px;">
                                    <label class="label3" for="">Địa chỉ: </label>
                                    <input id="txtAddress" name="txtAddress" type="text" class="form-control input-md" size="25" maxlength="100">
                                </div>
                                <div class="form-inline col-md-offset-1" style="margin-top:15px;margin-bottom:20px;">
                                    <label class="label3">Quốc tịch:</label>
                                    <select id="Country" name="Country" style="width:220px;" class="form-control input-md">
                                        <option value="England">England</option>
                                        <option value="Korea">Korea</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Việt Nam" selected>Việt Nam</option>
                                    </select>
                                </div>


                            </div>
                        </div>
                    </div>
                    <label class="label1" style="font-size:120%;"><b>Yêu cầu thêm</b>
                    </label>
                    <div class="col-md-12">
                        <div class="row" style="overflow-x: hidden;">
                            <textarea rows="3" cols="185" id="notetxt" name="notetxt" placeholder="Vui lòng ghi những thắc nhắc, yêu cầu của quý khách..." maxlength="100"></textarea>
                        </div>
                    </div>
                    <div class="col-md-2 col-md-offset-5" style="margin-top:10px;margin-bottom:10px;">
                        <button class="booking btn-block" value="btnBook" id="btnBook">Đặt phòng</button>
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
                            <img src="{{ asset('img/map.jpg') }}" />
                            <p class="footer-links">
                                <a href="#">Trang chủ</a> ·
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
                                <p><a href="#">anhduonghotel.com.vn</a>
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
    </form>
</body>
<script src="{{asset('Scripts/BookOnline/Confirm.js')}}"></script>
<script src="{{asset('Scripts/FrontCheck/CheckError.js')}}"></script>

</html>