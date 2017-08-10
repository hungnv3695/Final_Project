<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Add account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{!! asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css' ) }}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href=" {!! asset('css/index.css') !!}">
	<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <style type="text/css">
        body
        {
            padding: 0;
            margin: 0;
        }
        .label1{
            width:100px;
            text-align:right;
        }
		.Error
		{
			color: #D8000C;
			background-color: #FFBABA;
			height:40px;
			line-height:40px;
			opacity: 0.6;
			border-radius:5px;
			text-align:center;
		}
    </style>
</head>
<body>
<div class="container">
    <form method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="margin-top:6%;background-color:#c3bfc0;border-bottom:1px solid #898989;">
            <div class="row">
                <div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
					@if(Session::has('USER_INFO'))
					<b><a class="account" href=" {{url("/K012")}}"><i class="fa fa-user"></i>{!!Session::get('USER_INFO')->user_name !!} </a></b>
					@endif					
					<b>|</b><a class="logout" href="{!! url('/K001/LogOut') !!}"> Đăng xuất</a>
				</div>
                <div class="col-md-12">
                    <p class="brand-title">Thêm tài khoản</p>
                </div>
            </div>
        </div>

            <div class="col-md-6 col-md-offset-3" style="background-color:#c3bfc0;border-bottom:1px solid #898989;">
                <div class="col-md-12" style="margin:20px 0px 20px;border: 1px solid #898989;border-radius:10px;">
					@if(Session::has('ErrorMSG'))
						<div class="Error" style="margin-top:10px;">
							<label id="ErrorMsg"> {!! Session::get('ErrorMSG')!!} </label>
						</div>
					@endif
                    <div class="form-inline col-md-offset-2" style="margin-top:20px;">
                        <label class="label1" for="">Tên đăng nhập: </label>
                            <input id="txtUserName" name="txtUserName" type="text" class="form-control input-md" maxlength="20" size="20" oninvalid="InvalidMsg(this);" required />
                    </div>
                    <div class="form-inline col-md-offset-2" style="margin-top:20px;">
                        <label class="label1" for="">Họ tên: </label>
                        <input id="txtFullName" name="txtFullName" type="text" class="form-control input-md" maxlength="50" size="20" oninvalid="InvalidMsg(this);" required  />
                    </div>
                    <div class="form-inline col-md-offset-2" style="margin-top:20px;">
                        <label class="label1" for="">Chức vụ: </label>
                        <select id="Position" name="Position" style="width:195px;" class="form-control input-md">
                            <option value="G01" >Manager</option>
                            <option value="G02" >Receptionist</option>
                            <option value="G03" >Accountant</option>
                        </select>
                    </div>
                    <div class="form-inline col-md-offset-2" style="margin-top:20px;margin-bottom:20px;">
                        <label class="label1" for="">Trạng thái: </label>
                        <select id="Status" name="Status" style="width:195px;" class="form-control input-md">
                            <option value="0" selected>Hoạt Động</option>
                            <option value="1" selected>Không Hoạt Động</option>
                        </select>
                    </div>
                </div>
            </div>
        <div class="col-md-6 col-md-offset-3" style="background-color:#c3bfc0;">
            <div class="form-inline col-md-offset-8" style="margin-top:10px;margin-bottom:10px;">
                <button class="btn btn-success col-md-offset-2" value="bntAdd" name="bntAdd"><b>Thêm</b></button>
                <button type="button" class="btn btn-danger" value="backCancel" name="backCancel" style="margin-left:5px;" onclick="window.location='{{ url("/K011") }}'" ><b>Hủy bỏ</b></button>
            </div>
        </div>
    </div>
        <input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
    </form>
</div>
</body>
    <script src="{!! asset('Scripts/FrontCheck/CheckError.js') !!}"> </script>
	<script>  $("div.Error").delay(2000).slideUp(); </script>
</html>