<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Bootstrap 3 Simple Tables</title>
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
						<a href="#" class="col-md-offset-11" style="display:block;margin-top:10px;"><b>Log-out</b></a>
						<p class="brand-title" style="font-size:25px;">Quản Lý Khách Sạn</p>
					</div>
				</div>
					<div class="col-md-8 col-md-offset-2" style="background-color:rgb(230,230,230);border:1px solid rgb(215,215,215); border-top:none;">
						<div class="row">
							<div class="col-md-6 form-inline col-md-offset-3" style="border:3px solid rgb(220,220,220);border-radius:10px; background-color:white;margin-top:50px;margin-bottom:50px;">
								<div class="col-md-8 col-md-offset-2" style="margin-top:20px;"><button type="button"  class="btn btn-primary btn-block" value="btnRoomtypeManagement" name="btnRoomtypeManagement"  onclick="window.location='{{ url("/K010_2") }}'" ><b>Quản Lý Loại Phòng</b></button></div>
								<div class="col-md-8 col-md-offset-2" style="margin-top:20px;"><button type="button"  class="btn btn-primary btn-block" value="btnRoomManagement" name="btnRoomManagement"  onclick="window.location='{{ url("/K005_1") }}'" ><b>Quản Lý Phòng </b></button></div>								
								<div class="col-md-8 col-md-offset-2" style="margin-top:20px;"><button type="button" class="btn btn-primary btn-block" value="btnAccoutManagement" name="btnAccoutManagement" ><b>Quản Lý Tài Khoản</b></button></div>							
								<div class="col-md-8 col-md-offset-2" style="margin-top:20px;"><button type="button"  class="btn btn-primary btn-block" value="bntServiceManagement" name="bntServiceManagement"   onclick="window.location='{{ url("/K003") }}'"><b>Quản Lý Dịch Vụ</b></button></div>							
								<div class="col-md-8 col-md-offset-2" style="margin-top:20px;margin-bottom:20px;"><button type="button"  class="btn btn-primary btn-block" value="bntPageManagement" name="bntPageManagement"  ><b>Quản lý Trang</b></button></div>						
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
</body>
</html>