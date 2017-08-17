<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lễ tân</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css' ) }}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/index.css')}}">
    <style type="text/css">
        body
        {
            padding: 0;
            margin: 0;
        }
		.btnReceptionist{
			background: #426EB4;
			color: #fff;
			height:40px;
			border-radius: 7px;
			border:none;
		}
		.btnReceptionist:hover{
			background: #1B4F93;
			color: #fff;
		}
		p.receptionist{
			font-family: Arial, Helvetica, sans-serif;
			font-weight:100;
			color:#FFFFFF;
			font-size:16px;
			line-height:35px;
			letter-spacing:1.2px;
		}
    </style>
</head>
<body>
<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-top:5%;background-color:#c3bfc0;border-bottom:1px solid #898989;">
					<div class="row">
						<div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
							@if(Session::has('USER_INFO'))
						<b><a class="account" href=" {{url("/MyInfo")}}"><i class="fa fa-user"></i>{!!Session::get('USER_INFO')->user_name !!} </a></b>
						@endif					
						<b>|</b><a class="logout" href="{!! url('/LogOut') !!}"> Đăng xuất</a>
						</div>
						<div class="col-md-12">
							<p class="brand-title">Lễ tân</p>
						</div>
					</div>
			</div>
			<div class="col-md-8 col-md-offset-2" style="background-color:#c3bfc0;margin-bottom:10px;">
               <div class="row">
					<div class="col-md-6 form-inline col-md-offset-3" style="border:1px solid #898989;border-radius:10px;margin-top:50px;margin-bottom:50px;">
						<div class="col-md-10 col-md-offset-1" style="margin-top:20px;"><button type="button" class="btnReceptionist btn-block" value="btnReceiveRoom" name="btnReceiveRoom"  onclick="window.location='{{ url("/CheckInDetail?res_id=") }}'" ><p class="receptionist">Nhận phòng</p></button></div>
						<div class="col-md-10 col-md-offset-1" style="margin-top:20px;"><button type="button" class="btnReceptionist btn-block" value="btnReservation" name="btnReservation" onclick="window.location='{{ url("/BookOffline") }}'"  ><p class="receptionist">Đặt phòng khách sạn</p></button></div>
						<div class="col-md-10 col-md-offset-1" style="margin-top:20px;"><button type="button" class="btnReceptionist btn-block" value="btnReservationList" name="btnReservationList" onclick="window.location='{{ url("/ReservationList") }}'"><p class="receptionist">Danh sách đặt phòng</p></button></div>
						<div class="col-md-10 col-md-offset-1" style="margin-top:20px;"><button type="button" class="btnReceptionist btn-block" value="btnCheckinInfo" name="btnCheckinInfo"  onclick="window.location='{{ url("/CheckinList") }}'"  ><p class="receptionist">Thông tin nhận phòng</p></button></div>
						<div class="col-md-10 col-md-offset-1" style="margin-top:20px;"><button type="button" class="btnReceptionist btn-block" value="btnCheckinInfo" name="btnCheckinInfo"  onclick="window.location='{{ url("/CheckoutList") }}'"   ><p class="receptionist">Thông tin trả phòng</p></button></div>
						<div class="col-md-10 col-md-offset-1" style="margin-top:20px;margin-bottom:20px;"><button type="button"  class="btnReceptionist btn-block" value="bntMyaccount" name="bntMyaccount" onclick="window.location='{{ url("/MyInfo") }}'" ><p class="receptionist">Thông tin của tôi</p></button></div>
                    </div>
                </div>
			</div>
    </div>
</div>
</body>
</html>