<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Đặt phòng trực tiếp</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

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
		width : 100px;
		text-align:right;
	}
	</style>
</head>
<body>
<form id="myForm">
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="margin-top:2%;background-color:#c3bfc0;border-bottom:1px solid #898989;">
				<div class="row">
					<div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
						@if(Session::has('USER_INFO'))
						<b><a class="account" href=" {{url("/MyInfo")}}"><i class="fa fa-user"></i>{!!Session::get('USER_INFO')->user_name !!} </a></b>
						@endif					
						<b>|</b><a class="logout" href="{!! url('/LogOut') !!}"> Đăng xuất</a>
					</div>
					<div class="col-md-12">
						<p class="brand-title">Đặt phòng trực tiếp</p>
					</div>
				</div>
			</div>
			<div class="col-md-12" style="background-color:#c3bfc0;border-bottom:1px solid #898989;">
				<div class="row">
					<!--left-->
					<div class="col-md-5">
						<label class="control-label" style="margin-top:10px;">Thông tin đặt phòng</label>
						<div class="col-md-12" style="width:450px;margin:0px 0px 10px;border: 1px solid #898989;border-radius:10px;">
							<div class="row">
								<div class="form-inline" style="margin-top:20px;">
									<label class="label1">Ngày vào:</label>
									<input id="txtCheckin" name="txtCheckin" type="text" placeholder="MM/DD/YYY" class="form-control input-md" size="20">
								</div>
								<div class="form-inline" style="margin-top:10px;">
									<label class="label1">Ngày ra:</label>
									<input id="txtCheckout" name="txtCheckout" type="text" placeholder="MM/DD/YYY" class="form-control input-md" size="20" >
								</div>
								<div class="form-inline" style="margin-top:10px;margin-bottom:20px;">
									<label class="label1">Số người:</label>
									<input id="txtNumpeople" name="txtNumpeople" type="number" min="1" value="1" class="form-control input-md" size="5" style="width: 100px;">
									<label class="label1">Số phòng:</label>
									<input id="txtNumroom" name="txtNumroom" type="number" min="1" value="1" class="form-control input-md" size="5" style="width: 100px;">
									<div class="col-md-10 col-md-offset-4">
										<button class="btn btn-default" id="btnSearch" value="bntAddRoom" name="bntAddRoom" style="margin-top:20px;"><b>Tìm phòng</b></button>

									</div >
									<div class="col-md-10" style="margin:20px 30px 51px;border: 2px solid rgb(200,200,200);">
										<table id="jqGrid" style="border:1px solid gray;"></table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--right-->
					<div class="col-md-7">
						<label class="col-md-4 control-label" style="margin:10px 0px 0px -15px;">Thông tin khách hàng: </label>
						<div class="col-md-12" style="border: 1px solid #898989;border-radius:10px;margin:5px 0px 20px 0px;">
							<div class="row">
								<div class="form-inline" style="margin-top:20px;">
									<label class="label1">Họ tên:</label>
									<input id="txtFullname" name="txtFullname" type="text" class="form-control input-md" size="20" maxlength="50" oninvalid="this.setCustomValidity('Thông tin bắt buộc')" oninput="setCustomValidity('')" required >
									<label class="label1">Email:</label>
									<input id="txtEmail" name="txtEmail" type="email" class="form-control input-md" size="20" maxlength="50" oninvalid="(this.validity.typeMismatch)?this.setCustomValidity('Nhập đúng định dạng email'):this.setCustomValidity('Thông tin bắt buộc')"; oninput="(this.validity.typeMismatch)?this.setCustomValidity('Nhập đúng định dạng email'):this.setCustomValidity('')" required   >
								</div>
								<div class="form-inline" style="margin-top:10px;">
									<label class="label1">CMND:</label>
									<input id="txtCmt" name="txtCmt" type="text" class="form-control input-md" size="20" maxlength="12" oninvalid="this.setCustomValidity('Thông tin bắt buộc')" oninput="setCustomValidity('')" required >
									<label class="label1">Địa chỉ:</label>
									<input id="txtAddress" name="txtAddress" type="text" class="form-control input-md" size="20" maxlength="100"  >
								</div>
								<div class="form-inline" style="margin-top:10px;margin-bottom:25px;">
									<label class="label1">Điện thoại:</label>
									<input id="txtPhone" name="txtPhone" type="text" class="form-control input-md" size="20" maxlength="20" oninvalid="this.setCustomValidity('Thông tin bắt buộc')" oninput="setCustomValidity('')" required>
									<label class="label1">Công ty:</label>
									<input id="txtCompany" name="txtCompany" type="text" class="form-control input-md" size="20" maxlength="50"  >
								</div>
							</div>
						</div>

						<label class="col-md-4 control-label" style="margin:10px 0px 0px -15px;">Xác nhận đặt phòng:</label>
						<div class="col-md-12" style="border: 1px solid #898989;border-radius:10px;margin:5px 0px 20px 0px;">
							<div class="row">
								<div class="col-md-12 form-inline" id="infor">

								</div>

								<div class="col-md-10 form-inline" style="margin-top:30px;">
									<label class="label1 col-md-offset-3">Tiền phòng:</label>
									<input id="txtTotalprice" name="txtTotalprice" style="text-align: right" type="text" class="form-control input-md " size="15" readonly>
									<b>VNĐ</b>
								</div>
								<div class="col-md-10 form-inline" style="margin-top:10px;">
									<label class="label1 col-md-offset-3">Số đêm:</label>
									<input id="txtNight" name="txtNight" style="text-align: right" type="text" class="form-control input-md " size="2" readonly>
									<b>đêm</b>
								</div>
								<div class="col-md-10 form-inline" style="margin-top:10px;">
									<label class="label1 col-md-offset-3">VAT (10%):</label>
									<input id="txtVAT" name="txtVAT" style="text-align: right" type="text" class="form-control input-md " size="15" readonly>
                                    <b>VNĐ</b>
								</div>
								<div class="col-md-10 form-inline" style="margin-top: 10px;margin-bottom: 20px;">
									<label class="label1 col-md-offset-3">Tổng tiền:</label>
									<input id="txtTotal" name="txtTotal" style="text-align: right" type="text" class="form-control input-md " size="15" readonly>
									<b>VNĐ</b>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
			<div class="col-md-12" style="background-color:#c3bfc0;margin-bottom:10px;">
				<div class="row">
					<div class="col-md-6 col-md-offset-6" style="margin-top:10px; margin-bottom:10px;">
						<button class="btn btn-success col-md-offset-6" id="btnPrint" value="btnPrint" name="btnPrint" disabled><b>In hóa đơn</b></button>
						<button class="btn btn-primary" id="btnBook" value="btnBook" name="btnSave"><b>Đặt ngay</b></button>
						<button class="btn btn-danger" id= "btnBack" value="btnBack" name="btnBack"><b>Quay lại</b></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
</body>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="{{asset('Scripts/Reservation/BookOffline.js')}}"></script>

</html>