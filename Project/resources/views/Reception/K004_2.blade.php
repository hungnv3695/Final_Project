<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<!-- The jQuery library is a prerequisite for all jqSuite products -->
	<script type="text/ecmascript" src="{{asset('jqgrid/js/jquery-1.11.0.min.js') }}"></script>

	<!-- We support more than 40 localizations -->
	<script type="text/ecmascript" src="{{asset('jqgrid/js/i18n/grid.locale-en.js') }}"></script>
	<!-- This is the Javascript file of jqGrid -->
	<script type="text/ecmascript" src="{{asset('jqgrid/js/jquery.jqGrid.min.js')}}"></script>
	<!-- This is the localization file of the grid controlling messages, labels, etc.
    <!-- A link to a jQuery UI ThemeRoller theme, more than 22 built-in and many more custom -->
	<link rel="stylesheet" type="text/css" media="screen" href="{{asset('bootstrap-3.3.4-dist/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css' ) }}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/animate/animate.css')}}">
	<!-- The link to the CSS that the grid needs -->
	<link rel="stylesheet" type="text/css" media="screen" href="{{asset('jqgrid/css/ui.jqgrid-bootstrap.css')}}" />
	<script>
	</script>
	<script type="text/ecmascript" src="{{asset('bootstrap-3.3.4-dist/js/bootstrap.min.js') }}"></script>

	<link rel="stylesheet" type="text/css" media="screen" href="{{asset('datetimepicker-master/jquery.datetimepicker.css')}}" />
	<script type="text/ecmascript" src="{{asset('datetimepicker-master/jquery.datetimepicker.min.js')}}"></script>
	{{--<script type="text/ecmascript" src="{{asset('datetimepicker-master/jquery.js')}}"></script>--}}
	<script type="text/ecmascript" src="{{asset('datetimepicker-master/build/jquery.datetimepicker.full.min.js')}}"></script>

	<link rel="stylesheet" type="text/css" href="{{asset('css/index.css')}}">
    <style type="text/css">
		body
		{
			padding: 0;
			margin: 0;
		}
		.label1
		{
			width : 80px;
			text-align:right;
		}
		.label2
		{
			width : 120px;
			text-align:right;
		}
	</style>
	<title>Chi tiết đặt phòng</title>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12" style="margin-top:1%;background-color:rgb(236,236,236);border:1px solid rgb(215,215,215);">
			<div class="row">
				<div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
					@if(Session::has('USER_INFO'))
					<b><a class="account" href=" {{url("/K012")}}"><i class="fa fa-user"></i>{!!Session::get('USER_INFO')->user_name !!} </a></b>
					@endif					
					<b>|</b><a class="logout" href="{!! url('/K001/LogOut') !!}"> Đăng xuất</a>
				</div>
				<div class="col-md-12">
					<p class="brand-title">Chi tiết đặt phòng</p>
				</div>
			</div>
		</div>
		<div class="col-md-12" style="background-color:rgb(230,230,230);border:1px solid rgb(215,215,215); border-top:none;border-bottom:none;">
			<div class="row">
				<!--left-->
				<div class="col-md-6">
					<div class="col-md-12" style="border: 2px solid rgb(220,220,220);border-radius:10px;margin:10px 0px 10px;">
						<div class="row">
							<div class="form-inline" style="margin-top:20px;">
								<label class="label1">Họ tên:</label>
								<input id="fullnametxt" value="{{$name}}" name="fullnametxt" type="text" class="form-control input-md" size="15" maxlength="50" autofocus>
								<label class="label1">Địa chỉ:</label>
								<input id="addresstxt" value="{{$address}}" name="addresstxt" type="text" class="form-control input-md" size="15" maxlength="100">
							</div>
							<div class="form-inline" style="margin-top:10px;">
								<label class="label1">CMND:</label>
								<input id="idcardtxt" value="{{$idCard}}"  name="idcardtxt" type="text" class="form-control input-md" size="15" maxlength="12">
								<label class="label1">Quốc tịch:</label>
								<select id="countrytxt" name="countrytxt"  style="width:161px;" class="form-control input-md">
									<option value="England">Tiếng Anh</option>
									<option value="Korea">Hàn Quốc</option>
									<option value="Japan">Nhật Bản</option>
									<option value="VietNam" selected>Việt Nam</option>
								</select>
							</div>
							<div class="form-inline" style="margin-top:10px;">
								<label class="label1">Điện thoại:</label>
								<input id="phonetxt" name="phonetxt" value="{{$phone}}" type="text" class="form-control input-md" size="15" maxlength="20">
								<label class="label1">Công ty:</label>
								<input id="companytxt" name="companytxt" value="{{$company}}" type="text" class="form-control input-md" size="15" maxlength="50">
							</div>
							<div class="form-inline" style="margin-top:10px; margin-bottom:20px;">
								<label class="label1">Email:</label>
								<input id="emailtxt" name="emailtxt" value="{{$email}}" type="text" class="form-control input-md" size="15" maxlength="50">
							</div>
						</div>
					</div>
					<div class="col-md-12" style="border: 2px solid rgb(220,220,220);border-radius:10px;margin:10px 0px 10px;">
						<div class="row">
							<div class="form-inline" style="margin-top:30px;">
								<label class="label1">Nhận phòng:</label>
								<input id="checkintxt" name="checkintxt" value="{{$check_in}}" type="text" class="form-control input-md" size="15">
								<label class="label1">Trả phòng:</label>
								<input id="checkouttxt" name="checkouttxt" value="{{$check_out}}" type="text" class="form-control input-md" size="15">
							</div>
							<div class="form-inline" style="margin-top:20px;">
								<label class="label1">Số người:</label>
								<input id="numofpeopletxt" name="numofpeopletxt" value="{{$nopeople}}" type="number" min="1" class="form-control input-md" size="15" style="width: 80px;">
								<label class="label1">Số phòng:</label>
								<input id="noroomtxt" name="noroomtxt" value="{{$noroom}}" type="text" class="form-control input-md" size="15" style="width: 75px;" readonly>

								<label class="label1">Số đêm:</label>
								<input id="txtNight" name="txtNight" type="text" class="form-control input-md" size="15" style="width: 80px;" readonly>
							</div>
							<label class="label1" style="margin-top:20px;">Ghi chú:</label>
							<div class="col-md-12 form-inline" style="margin-top:5px; margin-left:7px;">
								<textarea rows="4" cols="64" id="notetxt" value="{{$note}}" name="notetxt" maxlength="300"></textarea>
							</div>
						</div>
					</div>
				</div>
				<!--right-->
				<div class="col-md-5" style="width:550px;margin:10px 0px 10px 10px;border: 2px solid rgb(220,220,220);border-radius:10px;">
					<label>Danh sách phòng: </label>
					<table id="jqGrid" style="border:1px solid black;"></table>

					<div class="form-inline"  style="margin-left: 150px; margin-top: 10px" >
						<label class="label1">Tổng tiền:</label>
						<input id="txtTotal" name="txtTotal" type="text" class="form-control input-md"  style="width: 110px;font-weight: bold;" readonly>
						<label class="label1" style="margin-left: -50px;  ">VNĐ</label>
					</div>
					<label style="margin-top:10px;">Thông tin thanh toán: </label>
					<div class="col-md-12" style="border: 2px solid rgb(220,220,220);border-radius:10px;">
						<div class="row">
							<div class="col-md-10 form-inline" style="margin-top:10px;">
								<label class="label2">Người thanh toán:</label>
								<input id="payertxt" name="payertxt" type="text" class="form-control" readonly>
							</div>
							<div class="col-md-10 form-inline" style="margin-top:10px;">
								<label class="label2">Ngày thanh toán:</label>
								<input id="paymentdatetxt" name="paymentdatetxt" type="text" class="form-control" readonly>
							</div>
							<div class="col-md-10 form-inline" style="margin-top:10px;margin-bottom:10px;">
								<label class="label2">Vào tài khoản:</label>
								<input id="accounttxt" name="accounttxt" type="text" class="form-control" readonly>
							</div>
						</div>
					</div>
					<div class="col-md-12 form-inline" style="margin:20px 0px 10px 0px;">
						<div class="row">
							<label class="label1">Trạng thái: </label>
							<select class="form-control input-md" id="cboStatus" name="statuscbo" style="width:130px;">

							</select>
							<button class="btn btn-success" value="btnSave" name="btnSave" id="btnSave" style="margin-left:20px;"><b>Lưu</b></button>
							<button class="btn btn-danger" value="btnBack" name="btnBack" id="btnBack" style="margin-left:5px;"><b>Quay lại</b></button>
							<button class="roomlistBnt" type="button" name="loadTable" id="btnTable" style="display:none"></button>
							<input id="res_id" name="res_id" type="text" value="{{$id}}" maxlength ="10" style="display:none">
							<input id="guest_id" name="guest_id" type="text" value="{{$guest_id}}" maxlength ="10" style="display:none">
							<input id="status" name="status" type="text" value="{{$status}}" maxlength ="10" style="display:none">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>

</script>
</body>
<script src="{{asset('Scripts/K004/K004_2.js')}}"></script>

</html>