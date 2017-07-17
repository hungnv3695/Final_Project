<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Edit reservation's room</title>
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
	</style>
</head>
<body>
        <div class="container">
            <div class="row">
				<div class="col-md-8 col-md-offset-2" style="background-color:rgb(215,215,215);margin-top:5%;">					
					<div class="col-md-8 form-horizontal col-md-offset-2" style="border:1px solid rgb(194,194,194); background-color:white;margin-top:20px;margin-bottom:20px; height:450px;">
						<div class="col-md-10 col-md-offset-1" style="margin-top:20px;">
							<label class="col-md-4 control-label">Kiểu phòng:</label>  
							<div class="col-md-5"><input id="txtRoomType" name="txtRoomType" value="{{$txtRoomType}}" type="text" class="form-control" readonly></div>
						</div>
						<div class="col-md-10 col-md-offset-1" style="margin-top:20px;">
							<label class="col-md-4 control-label">Số lượng:</label>  
							<div class="col-md-5"><input id="txtRoomNo" name="txtRoomNo" value="{{$txtRoomNo}}" type="text" class="form-control" readonly></div>
							<button class="roomlistBnt" id="btnSearch"  name="btnSearch"><b>Search</b></button>
						</div>
						<div><input id="txtResId" name="txtResId" value="{{$txtResId}}" type="text" class="form-control" style="display: none;"></div>
						<div><input id="txtCheckIn" name="txtCheckIn" value="{{$txtCheckIn}}" type="text" class="form-control" style="display: none;"></div>
						<div><input id="txtCheckOut" name="txtCheckIn" value="{{$txtCheckOut}}" type="text" class="form-control" style="display: none;"></div>
						<div class="col-md-12" style="margin-top:20px;margin-left:100px;">
							<table id="jqGrid" style="border:1px solid gray;"></table>

						</div>
						<div class="col-md-8 col-md-offset-6" style="margin-top:20px;">
							<button class="roomlistBnt" id="btnSave" value="saveBnt" name="searchBnt"><b>Save</b></button>
							<button class="roomlistBnt" id="btnBack" value="backBnt" name="backBnt" style="margin-left:10px;"><b>Back</b></button>
						</div>	
					</div>
				</div>
            </div>
        </div>


</body>
<script src="{{asset('Scripts/K004/K004_3.js')}}"></script>
</html>