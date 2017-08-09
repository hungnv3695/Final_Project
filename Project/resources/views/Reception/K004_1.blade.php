<!DOCTYPE html>
<meta name="_token" content="{!! csrf_token() !!}"/>
<html lang="en">

<head>
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

    <link rel="stylesheet" type="text/css" href="{{asset('css/index.css')}}">
    <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-8">
    <meta charset="utf-8" />
	<title>Reservation list</title>
	<style>
	body
	{
		padding: 0;
		margin: 0;
	}
	.label1{
		width:110px;
		text-align:right;
	}
	hr
	{
		background-color:#898989;
		height:1px; 
		border: 0;
	}
	</style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" style="margin-top:1%;background-color:#c3bfc0;border-bottom:1px solid #898989;">
				<div class="row">
					<div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
						@if(Session::has('USER_INFO'))
						<b><a class="account" href=" {{url("/K012")}}"><i class="fa fa-user"></i>{!!Session::get('USER_INFO')->user_name !!} </a></b>
						@endif					
						<b>|</b><a class="logout" href="{!! url('/K001/LogOut') !!}"> Đăng xuất</a>
					</div>
					<div class="col-md-12">
						<p class="brand-title" style="font-size:25px;">Danh sách đặt phòng</p>
					</div>
				</div>
            </div>
            <div class="col-md-10 col-md-offset-1" style="background-color:#c3bfc0;border-bottom:1px solid #898989;">
				<div class="row">
					<div class="form-inline col-md-offset-1" style="margin-top:20px;">
						<label class="label1" for="">Tên khách hàng:</label>
						<input id="txtFName" name="txtFName" type="text" class="form-control input-md" maxlength="50" autofocus>
						<label class="label1 col-md-offset-1" for="">CMND:</label>
						<input id="txtIdCard" name="txtIdCard" type="text" class="form-control input-md" maxlength="12">
						<button id="btnSearch" class="btn btn-default col-md-offset-1" type="button"><b>Tìm</b></button>
					</div>
					<div class="form-inline col-md-offset-1" style="margin-top:20px;">
						<label class="label1" for="">Trạng thái:</label>
						<select id="cboStatus" name="cboStatus" class="form-control input-md" style="width:150px;"></select>
					</div>
					<div class="row"><div class="col-md-12"><hr></div></div>
					<div class="col-md-12">
						<table id="jqGrid" style="border:1px solid gray;"></table>
						<div id="jqGridPager" style="height:40px;"></div>
					</div>
				</div>
            </div>
            <div class="col-md-10 col-md-offset-1" style="background-color:#c3bfc0;margin-bottom:10px;">
				<div class="row">
					<div class="col-md-2 col-md-offset-10 col-xs-7" style="margin-top:10px;margin-bottom:10px;">
						<button id="btnBack" class="btn btn-danger" type="button"><b>Quay lại</b></button>
					</div>
				</div>
            </div>

        </div>
    </div>




</body>

<script src="{{asset('Scripts/K004/K004_1.js')}}"></script>
</html>