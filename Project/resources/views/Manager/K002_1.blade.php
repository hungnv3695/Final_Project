<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Quản lý khách sạn</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
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
				<div class="col-md-8 col-md-offset-2" style="margin-top:5%;background-color:rgb(236,236,236);border:1px solid rgb(215,215,215);">
					<div class="row">
						<div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
							@if(Session::has('USER_INFO'))
								<p class="account">{!! "Xin chào " . Session::get('USER_INFO')->user_name !!} </p>
							@endif					
							<b>|</b><a href="{!! url('/K001/LogOut') !!}"><b> Đăng suất</b></a>
						</div>
						<div class="col-md-12">
							<p class="brand-title" style="font-size:25px;">Quản Lý Khách Sạn</p>
						</div>
					</div>
				</div>
					<div class="col-md-8 col-md-offset-2" style="background-color:rgb(230,230,230);border:1px solid rgb(215,215,215); border-top:none;">
						<div class="row">
							<div class="col-md-6 form-inline col-md-offset-3" style="border:3px solid rgb(220,220,220);border-radius:10px; background-color:white;margin-top:50px;margin-bottom:50px;">
								<div class="col-md-8 col-md-offset-2" style="margin-top:20px;"><button type="button"  class="btn btn-primary btn-block" value="btnRoomtypeManagement" name="btnRoomtypeManagement"  onclick="window.location='{{ url("/K010_2") }}'" ><b>Quản lý loại phòng</b></button></div>
								<div class="col-md-8 col-md-offset-2" style="margin-top:20px;"><button type="button"  class="btn btn-primary btn-block" value="btnRoomManagement" name="btnRoomManagement"  onclick="window.location='{{ url("/K005_1") }}'" ><b>Quản lý phòng </b></button></div>								
								<div class="col-md-8 col-md-offset-2" style="margin-top:20px;"><button type="button" class="btn btn-primary btn-block" value="btnAccoutManagement" name="btnAccoutManagement" ><b>Quản lý tài khoản</b></button></div>							
								<div class="col-md-8 col-md-offset-2" style="margin-top:20px;"><button type="button"  class="btn btn-primary btn-block" value="bntServiceManagement" name="bntServiceManagement"   onclick="window.location='{{ url("/K003") }}'"><b>Quản lý dịch vụ</b></button></div>							
								<div class="col-md-8 col-md-offset-2" style="margin-top:20px;margin-bottom:20px;"><button type="button"  class="btn btn-primary btn-block" value="bntPageManagement" name="bntPageManagement"  ><b>Quản lý trang</b></button></div>						
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
</body>
</html>