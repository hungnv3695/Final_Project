<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Quản lý khách sạn</title>
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
	.btnManager{
		background: #426EB4;
		color: #fff;
		height:40px;
		border-radius: 7px;
		border:none;
	}
	.btnManager:hover{
		background: #1B4F93;
		color: #fff;
	}
	p.manager{
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
				<div class="col-md-8 col-md-offset-2" style="margin-top:5%;background-color:#c3bfc0;border-bottom:1px solid #898989; ">
					<div class="row">
						<div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
							@if(Session::has('USER_INFO'))
							<b><a class="account" href=" {{url("/K012")}}"><i class="fa fa-user"></i>{!!Session::get('USER_INFO')->user_name !!} </a></b>
							@endif					
							<b>|</b><a class="logout" href="{!! url('/K001/LogOut') !!}"> Đăng xuất</a>
						</div>
						<div class="col-md-12">
							<p class="brand-title" style="font-size:25px;">Quản Lý Khách Sạn</p>
						</div>
					</div>
				</div>
					<div class="col-md-8 col-md-offset-2" style="background-color:#c3bfc0;">
						<div class="row">
							<div class="col-md-6 form-inline col-md-offset-3" style="border:1px solid #898989;border-radius:10px;margin-top:30px;margin-bottom:30px;">
								<div class="col-md-10 col-md-offset-1" style="margin-top:20px;"><button type="button"  class="btnManager btn-block" value="btnRoomtypeManagement" name="btnRoomtypeManagement"  onclick="window.location='{{ url("/K010_2") }}'" ><p class="manager">Quản lý loại phòng</p></button></div>
								<div class="col-md-10 col-md-offset-1" style="margin-top:20px;"><button type="button"  class="btnManager btn-block" value="btnRoomManagement" name="btnRoomManagement"  onclick="window.location='{{ url("/K005_1") }}'" ><p class="manager">Quản lý phòng </b></button></div>								
								<div class="col-md-10 col-md-offset-1" style="margin-top:20px;"><button type="button" class="btnManager btn-block" value="btnAccoutManagement" name="btnAccoutManagement"  onclick="window.location='{{ url("/K011") }}'" ><p class="manager">Quản lý tài khoản</p></button></div>
								<div class="col-md-10 col-md-offset-1" style="margin-top:20px;"><button type="button"  class="btnManager btn-block" value="bntServiceManagement" name="bntServiceManagement" ><p class="manager">Quản lý dịch vụ</p></button></div>
								<div class="col-md-10 col-md-offset-1" style="margin-top:20px;margin-bottom:20px;"><button type="button"  class="btnManager btn-block" value="bntMyaccount" name="bntMyaccount" onclick="window.location='{{ url("/K012") }}'" ><p class="manager">Thông tin của tôi</p></button></div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
</body>
</html>