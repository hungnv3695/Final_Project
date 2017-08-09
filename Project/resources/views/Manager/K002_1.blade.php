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
		<!--background-color:#DAA520;-->
	}
	.btnManager{
		background: rgb(160, 110, 78);
		color: #fff;
		height:40px;
		border-radius: 7px;
		border:none;
	}
	.btnManager:hover{
		background: rgb(200,105,30);
		color: #fff;
	}
	</style>
</head>
<body>
        <div class="container">
            <div class="row">
				<div class="col-md-8 col-md-offset-2" style="margin-top:5%;background-color:rgb(245,222,179);border:1px solid rgb(215,215,215);">
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
					<div class="col-md-8 col-md-offset-2" style="background-color:rgb(247,222,179);border:1px solid rgb(215,215,215); border-top:none;">
						<div class="row">
							<div class="col-md-6 form-inline col-md-offset-3" style="border:2px solid rgb(220,220,220);border-radius:10px;margin-top:30px;margin-bottom:30px;">
								<div class="col-md-10 col-md-offset-1" style="margin-top:20px;"><button type="button"  class="btnManager btn-block" value="btnRoomtypeManagement" name="btnRoomtypeManagement"  onclick="window.location='{{ url("/K010_2") }}'" ><b>Quản lý loại phòng</b></button></div>
								<div class="col-md-10 col-md-offset-1" style="margin-top:20px;"><button type="button"  class="btnManager btn-block" value="btnRoomManagement" name="btnRoomManagement"  onclick="window.location='{{ url("/K005_1") }}'" ><b>Quản lý phòng </b></button></div>								
								<div class="col-md-10 col-md-offset-1" style="margin-top:20px;"><button type="button" class="btnManager btn-block" value="btnAccoutManagement" name="btnAccoutManagement"  onclick="window.location='{{ url("/K011") }}'" ><b>Quản lý tài khoản</b></button></div>
								<div class="col-md-10 col-md-offset-1" style="margin-top:20px;"><button type="button"  class="btnManager btn-block" value="bntServiceManagement" name="bntServiceManagement" ><b>Quản lý dịch vụ</b></button></div>
								<div class="col-md-10 col-md-offset-1" style="margin-top:20px;margin-bottom:20px;"><button type="button"  class="btnManager btn-block" value="bntAccountManagement" name="bntAccountManagement" onclick="window.location='{{ url("/K012") }}'" ><b>Quản lý tài khoản</b></button></div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
</body>
</html>