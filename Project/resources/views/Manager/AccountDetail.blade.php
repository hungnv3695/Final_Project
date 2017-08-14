<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Account detail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href=" {!! asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css' ) }}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href=" {!! asset('css/index.css')  !!}">
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
    <div class="row">

        <form class="update" method="post">
            <div class="col-md-10 col-md-offset-1" style="margin-top:5%;background-color:#c3bfc0;border-bottom:1px solid #898989;">
                <div class="row">
                    <div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
					@if(Session::has('USER_INFO'))
					<b><a class="account" href=" {{url("/MyInfo")}}"><i class="fa fa-user"></i>{!!Session::get('USER_INFO')->user_name !!} </a></b>
					@endif					
					<b>|</b><a class="logout" href="{!! url('/LogOut') !!}"> Đăng xuất</a>
					</div>
                    <div class="col-md-12">
                        <p class="brand-title">Chi tiết tài khoản</p>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1" style="background-color:#c3bfc0;border-bottom:1px solid #898989;">
                    <div class="col-md-6">
						<div class="col-md-12 form-horizontal" style="margin:20px 0px 78px;border: 1px solid #898989;border-radius:10px;">
							@if(Session::has('ErrorMSG'))
								<div class="Error" style="margin-top:10px;">
									<label id="ErrorMsg"> {!! Session::get('ErrorMSG')!!} </label>
								</div>
							@endif
							<div class="form-inline col-md-offset-1" style="margin-top:20px;">
								<label class="label1" for="">Tên đăng nhập: </label>
								<input id="txtUserName" name="txtUserName" type="text" class="form-control input-md" size="20" value="{!! $acc[0]->user_id !!}" autofocus readonly />
							</div>
							<div class="form-inline col-md-offset-1" style="margin-top:20px;">
								<label class="label1" for="">Chức vụ: </label>
								<select id="Position" name="Position" style="width:195px;" class="form-control input-md">
									<option value="G01" {!!  ($acc[0]->group_cd == "G01") ? 'selected':''  !!} >Manager</option>
									<option value="G02" {!!  ($acc[0]->group_cd == "G02") ? 'selected':''  !!} >Receptionist</option>
									<option value="G03" {!!  ($acc[0]->group_cd == "G03") ? 'selected':''  !!}>Accountant</option>
								</select>
							</div>
							<div class="form-inline col-md-offset-1" style="margin-top:20px;margin-bottom:70px;">
								<label class="label1" for="">Trạng thái: </label>
								<select id="Status" name="Status" style="width:195px;" class="form-control input-md">

									@if($acc[0]->acc_lock_flg == '1')
										<option value="2" {!!  $acc[0]->acc_lock_flg == '1'?'selected':''  !!}> Đang bị khóa</option>
									@else
										<option value="0" {!!  $acc[0]->delete_flg == '0'?'selected':''  !!} >Đang hoạt động</option>
										<option value="1" {!!  $acc[0]->delete_flg == '1'?'selected':''  !!} !!} >Không hoạt động</option>
									@endif
								</select>
							</div>
						</div>
						<div class="form-inline col-md-offset-1" style="margin-bottom:10px;">
							<button class="btn btn-success col-md-offset-1" value="bntAdd"  id="bntSave" name="bntSave"><b>Lưu</b></button>
							<button class="btn btn-primary" value="btnReset" id="btnReset" name="btnReset"><b>Đặt lại mật khẩu</b></button>
							<button type="button" class="btn btn-danger" value="btnCancel" name="backCancel" onclick="window.location='{{ url("/AccountList") }}'" ><b>Hủy bỏ</b></button>
						</div>
                    </div>
                    <div class="col-md-6">
						<div class="col-md-12 form-horizontal" style="margin:20px 0px 20px;border: 1px solid #898989;border-radius:10px;">
							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Họ tên: </label>
								<input id="txtFullName" name="txtFullName" type="text" class="form-control input-md" size="25" value="{!! $acc[0]->user_name !!}" readonly />
							</div>
							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Địa chỉ: </label>
								<input id="txtAddress" type="text" name="txtAddress" class="form-control" size="25" maxlength="100"  value="{!! $acc[0]->address !!}" readonly />  
							</div>
							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Điện thoại: </label>
								<input id="txtPhone" name="txtPhone" type="text" class="form-control input-md" size="25" value="{!! $acc[0]->phone !!}" readonly />
							</div>
							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Email: </label>
								<input id="txtEmail" name="txtEmail" type="text" class="form-control input-md" size="25" value="{!! $acc[0]->mail !!}" readonly />
							</div>
							<div class="form-inline" style="margin-top:20px;">	
								<label class="label1" for="">CMND: </label>
								<input id="txtCMT" name="txtCMT" type="text" class="form-control input-md" size="25" readonly value="{!! $acc[0]->identity_card !!}"/>
							</div>
							<div class="form-inline" style="margin-top:20px;margin-bottom:20px;">
								<label class="label1" for="">Nơi cấp: </label>
								<input id="txtLocation" name="txtLocation" type="text" class="form-control input-md" size="25" value="{!! $acc[0]->identity_card_location !!}" readonly />
							</div>
						</div>
                    </div>
            </div>
            <input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
        </form>

    </div>
</div>
</body>
<script>
    var status = {!!  isset($acc[0]->acc_lock_flg)?json_encode($acc[0]->acc_lock_flg ):""  !!};

    console.log(status);
    if(status == '1'){
        document.getElementById('btnReset').removeAttribute('disabled');
        document.getElementById('bntSave').setAttribute('disabled',true);
    }else{
        document.getElementById('btnReset').setAttribute('disabled',true);
        document.getElementById('bntSave').removeAttribute('disabled');
    }
</script>
<script>  $("div.Error").delay(2000).slideUp(); </script>
</html>