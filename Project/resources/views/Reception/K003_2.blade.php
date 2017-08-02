<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Nhận phòng</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/ecmascript" src="{{asset('jqgrid/js/jquery-1.11.0.min.js') }}"></script>

	<!-- We support more than 40 localizations -->
	<script type="text/ecmascript" src="{{asset('jqgrid/js/i18n/grid.locale-en.js') }}"></script>
	<!-- This is the Javascript file of jqGrid -->
	<script type="text/ecmascript" src="{{asset('jqgrid/js/jquery.jqGrid.min.js')}}"></script>
	<!-- This is the localization file of the grid controlling messages, labels, etc.
    <!-- A link to a jQuery UI ThemeRoller theme, more than 22 built-in and many more custom -->
	<link rel="stylesheet" type="text/css" media="screen" href="{{asset('bootstrap-3.3.4-dist/css/bootstrap.min.css')}}" />
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
		table {
			width: 100%;
			border:1px solid rgb(220,220,220);
		}

		/*thead, tbody, tr, td, th { display: block; }*/

		tr:after {
			content: ' ';
			display: block;
			visibility: hidden;
			clear: both;
		}

		thead th {
			height: 30px;
			/*text-align: left;*/
		}

		tbody {
			height: 120px;
			overflow-y: auto;
		}
		thead {
			border-bottom : 1px solid rgb(200,200,200);
		}

		.col1
		{
			width: 10%;
			float:left;
		}
		.col2
		{
			width:30%;
			float:left;
		}
		.col3
		{
			width: 30%;
			float:left;
		}
		.col4
		{
			width: 30%;
			float:left;
		}
	</style>
</head>
<body>
<form id="myForm">


<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1" style="margin-top:2%;background-color:rgb(236,236,236);border:1px solid rgb(215,215,215);">
			<div class="row">
				<div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
					@if(Session::has('USER_INFO'))
						<p class="account">{!! "Xin chào " . Session::get('USER_INFO')->user_name !!} </p>
					@endif
					<b>|</b><a href="{!! url('/K001/LogOut') !!}"><b> Đăng xuất</b></a>
				</div>
				<div class="col-md-12">
					<p class="brand-title">Nhận phòng</p>
				</div>
			</div>
		</div>
		<div class="col-md-10 col-md-offset-1" style="background-color:rgb(230,230,230);border:1px solid rgb(215,215,215); border-top:none;border-bottom:none;">
			<!--top-->
			<label class="control-label" style="margin-top:5px;">Thông tin đặt phòng</label>
			<div class="col-md-12" style="border: 2px solid rgb(220,220,220);border-radius:10px;margin:5px 0px 20px 0px;">
				<div class="col-md-6" style="border-right:1px solid rgb(240,240,240);">
					<div class="form-inline col-md-offset-1" style="margin-top:20px;">
						<label class="label1">Ngày vào:</label>
						<input id="txtCheckin" name="txtCheckin" type="text" placeholder="MM/DD/YYY" class="form-control input-md" size="20" >
					</div>
					<div class="form-inline" style="margin-top:10px;margin-bottom:20px;">
						<label class="label1 col-md-offset-1">Ngày ra:</label>
						<input id="txtCheckout" name="txtCheckout" type="text" placeholder="MM/DD/YYY" class="form-control input-md" size="20" >
						<button class="btn btn-default col-md-offset-1" id="btnSearch" value="bntSearch" name="bntCancel"><b>Tìm</b></button>
					</div>
					<div class="col-md-10" style="margin:20px 30px 10px;border: 2px solid rgb(200,200,200);">
						<table id="jqGrid" style="border:1px solid gray;"></table>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-inline col-md-offset-1" style="margin-top:20px;">
						<label class="label1">Số đêm:</label>
						<input id="txtNumOfDay" name="txtNumOfDay" type="text" class="form-control input-md" size="18" readonly>
					</div>
					<div class="form-inline col-md-offset-1" style="margin-top:10px;">
						<label class="label1" for="">Kiểu phòng: </label>
						<select id="roomtype" name="roomtype" class="form-control input-md" style="width:180px;" readonly>

						</select>
					</div>
					<div class="form-inline col-md-offset-1" style="margin-top:10px;">
						<label class="label1" for="">Số phòng: </label>
						<select id="cboRoomNo" name="cboRoomNo" class="form-control input-md" style="width:90px;" readonly>

						</select>
					</div>
					<div class="form-inline col-md-offset-1" style="margin-top:20px;">
						<label class="label1">Số người:</label>
						<input id="numofpeople" name="numofpeople" type="number" class="form-control input-md" min="1" style="width:180px;" readonly>
					</div>
					<div class="form-inline col-md-offset-1" style="margin-top: 10px;">
						<label class="label1" for="">Tổng tiền:</label>
						<input id="txtTotalprice" name="txtTotalprice" type="text" class="form-control input-md " size="10" readonly>
						<label class="control-label" for="">x1000 VND</label>
					</div>
					<div class="form-inline col-md-offset-1" style="margin-top:10px;margin-bottom:20px;">
						<label class="label1" for="">Ghi chú: </label>
						<textarea rows="3" cols="25" id="txtNote" class="form-control" name="txtNote" maxlength="100"></textarea>
					</div>


				</div>
			</div>
			<!--bottom-->
			<div class="col-md-6">
				<label class="control-label">Người đặt phòng</label>
				<div class="col-md-12" style="border: 2px solid rgb(220,220,220);border-radius:10px;margin-bottom:10px;">
					<div class="form-inline col-md-offset-1" style="margin-top:20px;">
						<label class="label1" for="">Họ tên: </label>
						<input id="txtFullname1" name="txtFullname1" type="text" class="form-control input-md" size="20" maxlength="50">
					</div>
					<div class="form-inline col-md-offset-1" style="margin-top:10px;">
						<label class="label1" for="">CMND: </label>
						<input id="txtIdcard1" name="txtIdcard1" type="text" class="form-control input-md" size="20" maxlength="12">
					</div>
					<div class="form-inline col-md-offset-1" style="margin-top:10px;">
						<label class="label1" for="">Điện thoại: </label>
						<input id="txtPhone1" name="txtPhone1" type="text" class="form-control input-md" size="20" maxlength="20">
					</div>
					<div class="form-inline col-md-offset-1" style="margin-top:10px;margin-bottom:20px;">
						<label class="label1" for="">Email: </label>
						<input id="txtEmail1" name="txtEmail1" type="text" class="form-control input-md" size="20" maxlength="50">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<label class="control-label">Người nhận phòng</label>
				<div class="col-md-12" style="border: 2px solid rgb(220,220,220);border-radius:10px;margin-bottom:10px;">
					<div class="form-inline" style="margin-top:20px;">
						<label class="label1 col-md-offset-1" for="">Họ tên: </label>
						<input id="txtFullname2" name="txtFullname2" type="text" class="form-control input-md" size="20" maxlength="50" readonly>
					</div>
					<div class="form-inline col-md-offset-1" style="margin-top:10px;">
						<label class="label1" for="">CMND: </label>
						<input id="txtIdcard2" name="txtIdcard2" type="text" class="form-control input-md" size="20" maxlength="12" readonly>
					</div>
					<div class="form-inline col-md-offset-1" style="margin-top:10px;">
						<label class="label1" for="">Điện thoại: </label>
						<input id="txtPhone2" name="txtPhone2" type="text" class="form-control input-md" size="20" maxlength="20" readonly>
					</div>
					<div class="form-inline col-md-offset-1" style="margin-top:10px;margin-bottom:20px;">
						<label class="label1" for="">Email: </label>
						<input id="txtEmail2" name="txtEmail2" type="text" class="form-control input-md" size="20" maxlength="50"  readonly>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-10 col-md-offset-1" style="background-color:rgb(236,236,236);border:1px solid rgb(215,215,215);">
			<div class="row">
				<div class="col-md-5 col-md-offset-9" style="margin-top:10px; margin-bottom:10px;">
					<button class="btn btn-primary col-md-offset-1" id="btnCheckin" value="btnCheckin" name="btnSave"><b>Nhận phòng</b></button>
					<button class="btn btn-danger" id="btnBack" value="bntCancel" name="bntCancel"><b>Quay lại</b></button>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
</body>
<script src="{{asset('Scripts/K003/K003_2.js')}}"></script>
</html>