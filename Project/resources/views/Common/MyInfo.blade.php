<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Thông tin của tôi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{!! asset("plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css") !!} ">
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
        .label1
        {
            width : 110px;
            text-align:right;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <form method="post">
            <div class="col-md-6 col-md-offset-3" style="margin-top:3%;background-color:#c3bfc0;border-bottom:1px solid #898989;">
                <div class="row">
                    <div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
						@if(Session::has('USER_INFO'))
						<b><a class="account" href=" {{url("/K012")}}"><i class="fa fa-user"></i>{!!Session::get('USER_INFO')->user_name !!} </a></b>
						@endif					
						<b>|</b><a class="logout" href="{!! url('/K001/LogOut') !!}"> Đăng xuất</a>
                    </div>
                    <div class="col-md-12">
                        <p class="brand-title">Thông tin của tôi</p>

                        @if(Session()->has('SuccessMSG'))
                        <div class="alert alert-success">
                            {!! Session()->get('SuccessMSG') !!}
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-md-offset-3" style="background-color:#c3bfc0;border-bottom:1px solid #898989;">

                <div class="row">
                    <div class="col-md-12" style="margin-top:10px;border-bottom:1px solid #898989;">
                        <ul class="nav nav-tabs">
                            <li class="active "id="panel1-btn"><a href="#"><b>Thông tin tài khoản</b></a></li>
                            <li id="panel2-btn"><a href="#"><b>Thông tin cá nhân</b></a></li>
                        </ul>
                    </div>
                </div>
                <div id="panel1">
                    <div class="col-md-12" style="margin-top:20px;margin-bottom:20px;border: 1px solid #898989;border-radius:10px;">
                        <div class="form-inline col-md-offset-1" style="margin-top:20px;">
                            <label class="label1" for="">Tên tài khoản: </label>
                            <input id="txtAccountName" name="txtAccountName" type="text" class="form-control input-md" size="27" value="{!! $user[0]->user_id !!}"readonly >
                        </div>
                        <div class="form-inline col-md-offset-1" style="margin-top:20px;">
                            <label class="label1" for="">Vị trí: </label>
                            @if($user[0]->group_cd == 'G01')
                                <input id="txtPosition" name="txtPosition" type="text" class="form-control input-md" size="27" value="Manager" readonly>
                            @elseif($user[0]->group_cd == 'G02')
                                <input id="txtPosition" name="txtPosition" type="text" class="form-control input-md" size="27" value="Receptionist" readonly>
                            @elseif($user[0]->group_cd == 'G03')
                                <input id="txtPosition" name="txtPosition" type="text" class="form-control input-md" size="27" value="Accountant" readonly>
                            @endif
                        </div>
                        <div class="form-inline col-md-offset-1" style="margin-top:20px;">
                            <label class="label1" for="">Trạng thái: </label>
                            @if($user[0]->delete_flg == '1')
                                <input id="txtStatus" name="txtStatus" type="text" class="form-control input-md" size="27" value="Không hoạt động" readonly >
                            @elseif ($user[0]->acc_lock_flg == '1')
                                <input id="txtStatus" name="txtStatus" type="text" class="form-control input-md" size="27" value="Đang bị khóa" readonly>
                            @else
                                <input id="txtStatus" name="txtStatus" type="text" class="form-control input-md" size="27" value="Đang hoạt động" readonly>
                            @endif

                        </div>
                        <div class="form-inline col-md-offset-1" style="margin-top:20px;">
                            <label class="label1" for="">Ngày tạo: </label>
                            <?php
                            $date = $user[0]->create_ymd;
                            ?>
                            <input id="txtCreateDay" name="txtCreateDay" type="text" class="form-control input-md" size="27" value="{!! $date !!} " readonly>
                        </div>
                        <div class="col-md-7 col-md-offset-3" style="margin-top:20px;margin-bottom:20px;"><button class="btn btn-primary btn-block" type="button" value="btnchangepass" name="btnchangepass" onclick="window.location='{{ url("/K012/K012_1") }}'" ><b>Đổi mật khẩu</b></button></div>
                    </div>
                </div>
                <div id="panel2">
                    <div class="col-md-12" style="margin-top:20px;margin-bottom:20px;border: 1px solid #898989;border-radius:10px;">
                        <div class="form-inline col-md-offset-1" style="margin-top:20px;">
                            <label class="label1" for="">Họ tên: </label>
                            <input id="txtFullName" name="txtFullName" type="text" class="form-control input-md" maxlength="50" size="25" value="{!! $user[0]->user_name !!}" oninvalid="InvalidMsg(this);" required  >
                        </div>
                        <div class="form-inline col-md-offset-1" style="margin-top:20px;">
                            <label class="label1" for="">Địa chỉ: </label>
                            <input id="txtAddress" name="txtAddress" type="text" class="form-control input-md" size="25" maxlength="100"  value="{!! $user[0]->address !!}" oninvalid="InvalidMsg(this);" required  >
                        </div>
                        <div class="form-inline col-md-offset-1" style="margin-top:20px;">
                            <label class="label1" for="">CMND: </label>
                            <input id="txtIdCard" name="txtIdCard" type="text" class="form-control input-md" size="25" maxlength="12"  value="{!! $user[0]->identity_card !!}" oninvalid="InvalidMsg(this);" required >
                        </div>
                        <div class="form-inline col-md-offset-1" style="margin-top:20px;">
                            <label class="label1" for="">Nơi cấp: </label>
                            <input id="txtLocation" name="txtLocation" type="text" class="form-control input-md" size="25"  maxlength="20" value="{!! $user[0]->tax_code !!}"  oninvalid="InvalidMsg(this);" required >
                        </div>
						<div class="form-inline col-md-offset-1" style="margin-top:20px;">
                            <label class="label1" for="">Điện thoại: </label>
                            <input id="txtPhone" name="txtPhone" type="text" class="form-control input-md" size="25" maxlength="20"  value="{!! $user[0]->phone !!}" oninvalid="InvalidMsg(this);" required  >
                        </div>
                        <div class="form-inline col-md-offset-1" style="margin-top:20px;margin-bottom:20px;">
                            <label class="label1" for="">Email: </label>
                            <input id="txtEmail" name="txtEmail" type="email" class="form-control input-md" size="25" maxlength="50"  value="{!! $user[0]->mail !!}" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required  >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3" style="background-color:#c3bfc0;margin-bottom:10px;">
                <div id="panel3">
                    <div class="form-inline col-md-offset-10" style="margin-top:10px;margin-bottom:10px;">
                        <button type="button" class="btn btn-danger col-md-offset-2" value="bntBack" name="bntBack" onclick="window.location='{{ url("/K002") }}'" ><b>Quay lại</b></button>
                    </div>
                </div>
                <div id="panel4">
                    <div class="form-inline col-md-offset-9" style="margin-top:10px;margin-bottom:10px;">
                        <button class="btn btn-success" value="bntSave" name="bntSave"><b>Lưu</b></button>
                        <button type="button" class="btn btn-danger" value="bntBack" name="bntBack"  onclick="window.location='{{ url("/K002") }}'" ><b>Quay lại</b></button>
                    </div>
                </div>
            </div>
            <input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
        </form>

    </div>
</div>
<script>
    (function(){
        $('#panel1').show();
        $('#panel2').hide();
        $('#panel3').show();
        $('#panel4').hide();
        $('#panel1-btn').click(function(){
            $('#panel1').show();$('#panel3').show();$('#panel2-btn').removeClass('active');
            $('#panel2').hide();$('#panel4').hide();$('#panel1-btn').addClass('active');
        });
        $('#panel2-btn').click(function(){
            $('#panel1').hide();$('#panel3').hide();$('#panel2-btn').addClass('active');
            $('#panel2').show();$('#panel4').show();$('#panel1-btn').removeClass('active');
        });
    })();
</script>
<script src="{!! asset('Scripts/FrontCheck/CheckError.js') !!}"> </script>
<script>  $("div.alert").delay(2000).slideUp(); </script>
</body>
</html>