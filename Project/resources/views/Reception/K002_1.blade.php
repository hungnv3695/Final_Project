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
    </style>
</head>
<body>
<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-top:7%;background-color:#c3bfc0;border-bottom:1px solid #898989;">
					<div class="row">
						<div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
							@if(Session::has('USER_INFO'))
						<b><a class="account" href=" {{url("/K012")}}"><i class="fa fa-user"></i>{!!Session::get('USER_INFO')->user_name !!} </a></b>
						@endif					
						<b>|</b><a class="logout" href="{!! url('/K001/LogOut') !!}"> Đăng xuất</a>
						</div>
						<div class="col-md-12">
							<p class="brand-title">Lễ tân</p>
						</div>
					</div>
			</div>
			<div class="col-md-8 col-md-offset-2" style="background-color:#c3bfc0;">
               <div class="row">
					<div class="col-md-6 form-inline col-md-offset-3" style="border:1px solid #898989;border-radius:10px;margin-top:50px;margin-bottom:50px;">
                        <div class="col-md-8 col-md-offset-2" style="margin-top:40px;"><button type="button" class="btn btn-primary btn-block" value="btnRoomstatus" name="btnRoomstatus" onclick="window.location='{{ url("/K003") }}'"><b>Trạng thái phòng</b></button></div>
						<div class="col-md-8 col-md-offset-2" style="margin-top:20px;"><button type="button" class="btn btn-primary btn-block" value="btnReservation" name="btnReservation" onclick="window.location='{{ url("/K004_4?res_id=") }}'"  ><b>Đặt phòng</b></button></div>
						<div class="col-md-8 col-md-offset-2" style="margin-top:20px;margin-bottom:40px;"><button type="button" class="btn btn-primary btn-block" value="btnReservationList" name="btnReservationList" onclick="window.location='{{ url("/K004_1") }}'"><b>Danh sách đặt phòng</b></button></div>
                    </div>
                </div>
			</div>
    </div>
</div>
</body>
</html>