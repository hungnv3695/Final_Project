<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin phòng đặt</title>
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
        <div class="container">
            <div class="row">

				<div class="col-md-10 col-md-offset-1" style="background-color:rgb(230,230,230);margin-top:5%;">
					<div class="col-md-12" style="margin-top:3%;background-color:rgb(236,236,236);">
						<div class="row">
							<div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
								@if(Session::has('USER_INFO'))
									<p class="account">{!! "Xin chào " . Session::get('USER_INFO')->user_name !!} </p>
								@endif
								<b>|</b><a href="{!! url('/K001/LogOut') !!}"><b> Log-out</b></a>
							</div>
					</div>
					<div class="col-md-6 form-horizontal col-md-offset-3" style="border: 2px solid rgb(220,220,220);border-radius:10px; background-color:white;margin-top:20px;margin-bottom:20px;">
						<div class="form-inline col-md-offset-1" style="margin-top:20px;">
							<label class="label1" for="">Kiểu phòng:</label>  
							<input id="txtRoomType" name="txtRoomType" value="{{$txtRoomType}}" type="text" size="15" class="form-control" readonly>
						</div>
						<div class="form-inline col-md-offset-1" style="margin-top:20px;">
							<label class="label1" for="">Số lượng:</label>  
							<input id="txtRoomNo" name="txtRoomNo" value="{{$txtRoomNo}}" type="text" size="15" class="form-control" readonly>
							<button class="btn btn-primary col-md-offset-1" id="btnSearch"  name="btnSearch"><b>Tìm</b></button>
						</div>
						<input id="txtResId" name="txtResId" value="{{$txtResId}}" type="text" class="form-control" style="display: none;">
						<input id="txtCheckIn" name="txtCheckIn" value="{{$txtCheckIn}}" type="text" class="form-control" style="display: none;">
						<input id="txtCheckOut" name="txtCheckIn" value="{{$txtCheckOut}}" type="text" class="form-control" style="display: none;">
						<div class="col-md-offset-3" style="margin-top:20px;">
							<table id="jqGrid" style="border:1px solid gray;"></table>
						</div>
						<div class="col-md-5 col-md-offset-6" style="margin-top:30px;margin-bottom:20px;">
							<button class="btn btn-primary col-md-offset-1" id="btnSave" value="btnSave" name="btnSave"><b>Lưu</b></button>
							<button class="btn btn-danger" id="btnBack" value="btnBack" name="btnBack"><b>Hủy bỏ</b></button>
						</div>	
					</div>
				</div>
            </div>
        </div>


</body>
<script src="{{asset('Scripts/K004/K004_3.js')}}"></script>
</html>