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
		<div class="col-md-12 col-xs-12" style="margin-top:2%;background-color:rgb(236,236,236);">
			<p class="brand-title">Reservation Detail</p>
		</div>
		<div class="col-md-12 col-xs-12" style="background-color:rgb(215,215,215);">
			<!--Left-->
			<div class="col-md-7 col-xs-12" style="left:-40px;border-right:1px solid rgb(194,194,194);">
				<div class="col-md-6 col-xs-7" style="margin-top:10px;">
					<form class="form-horizontal">
						<fieldset>
							<div class="form-group">
								<label class="col-md-5 control-label" for="">Ngày vào:</label>
								<div class="col-md-6">
									<input id="checkin" name="checkin" type="text" value="{{$check_in}}" class="form-control input-md" maxlength ="10">

								</div>

							</div>
							<div class="form-group">
								<label class="col-md-5 control-label" for="">Ngày ra:</label>
								<div class="col-md-6">
									<input id="checkout" name="checkout" type="text" value="{{$check_out}}" class="form-control input-md" maxlength ="10">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label" for="">Tên khách hàng:</label>
								<div class="col-md-7">
									<input id="cusName" name="cusName" type="text" value="{{$name}}" class="form-control input-md" maxlength ="20">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label" for="">CMND:</label>
								<div class="col-md-7">
									<input id="cmnd" name="cmnd" type="text" value="{{$idCard}}" class="form-control input-md" maxlength ="12">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label" for="">Điện thoại:</label>
								<div class="col-md-7">
									<input id="phone" name="phone" type="text" value="{{$phone}}" class="form-control input-md" maxlength ="15">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label" for="">Email:</label>
								<div class="col-md-7">
									<input id="email" name="email" type="email" value="{{$email}}" placeholder="@gmail.com" class="form-control input-md" maxlength ="20">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label" for="">Địa chỉ:</label>
								<div class="col-md-7">
									<input id="address" name="address" type="text" value="{{$address}}" class="form-control input-md" maxlength ="30">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label" for="">Ghi chú:</label>
								<div class="col-md-7">
									<textarea rows="3" cols="30" id="note" name="note" autofocus maxlength="300"></textarea>
								</div>
							</div>
						</fieldset>
					</form>
				</div>

				<div class="col-md-6 col-xs-7" style="margin-top:157px;">
					<form class="form-horizontal">
						<fieldset>

							<div class="form-group">
								<label class="col-md-4 control-label" for="">Ngày cấp:</label>
								<div class="col-md-8">
									<input id="proDate" name="proDate" type="text" class="form-control input-md" maxlength ="10">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="">Cơ quan:</label>
								<div class="col-md-8">
									<input id="comName" name="comName" type="text" value="{{$company}}" class="form-control input-md" maxlength ="15">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="">Quốc tịch:</label>
								<div class="col-md-6">
									<select id="country" name="country" style="width:155px;" class="form-control input-md">
									</select>
								</div>
							</div>
						</fieldset>
						<div class="col-md-1 control-label" style="display: none;">
							<input id="res_id" name="res_id" type="text" value="{{$id}}" maxlength ="10">
							<input id="number_of_room" name="number_of_room" type="text" value="{{$number_of_room}}" maxlength ="10">
						</div>
					</form>
				</div>
			</div>
			<!--End left-->
			<!--Right-->
			<div class="col-md-5">
				<form class="form-inline" style="margin-top:10px;">
					<div class="form-group" id="room1" >
						<label>Room 1:</label>
						<input id="room1txt" name="room1txt" type="text" class="form-control input-md" readonly="readonly" size="5">
						<input id="double1txt" name="double1txt" type="text" class="form-control input-md" readonly="readonly" placeholder="Double" size="8">
						<input id="price1txt" name="price1txt" type="text" class="form-control input-md" dir="rtl" maxlength ="10" size="8">
						<button class="btn btn-default" id="editBtn1" name="editBtn1"><b>Edit</b></button>
					</div>
				</form>
				<form class="form-inline" style="margin-top:5px;">
					<div class="form-group" id="room2">
						<label>Room 2:</label>
						<input id="room2txt" name="room2txt" type="text" class="form-control input-md" readonly="readonly" size="5">
						<input id="double2txt" name="double2txt" type="text" class="form-control input-md" readonly="readonly" placeholder="Double" size="8">
						<input id="price2txt" name="price2txt" type="text" class="form-control input-md" dir="rtl" maxlength ="10" size="8">
						<button class="btn btn-default" id="editBtn2" name="editBtn2"><b>Edit</b></button>
					</div>
				</form>
				<form class="form-inline" style="margin-top:5px;">
					<div class="form-group" id="room3">
						<label>Room 3:</label>
						<input id="room3txt" name="room3txt" type="text" class="form-control input-md" readonly="readonly" size="5">
						<input id="double3txt" name="double3txt" type="text" class="form-control input-md" readonly="readonly" placeholder="Double" size="8">
						<input id="price3txt" name="price3txt" type="text" class="form-control input-md" dir="rtl" maxlength ="10" size="8">
						<button class="btn btn-default" id="editBtn3" name="editBtn3"><b>Edit</b></button>
					</div>
				</form>
				<form class="form-inline" style="margin-top:5px;">
					<div class="form-group" id="room4">
						<label>Room 4:</label>
						<input id="room4txt" name="room4txt" type="text" class="form-control input-md" readonly="readonly" size="5">
						<input id="double4txt" name="double4txt" type="text" class="form-control input-md" readonly="readonly" placeholder="Double" size="8">
						<input id="price4txt" name="price4txt" type="text" class="form-control input-md" dir="rtl" maxlength ="10" size="8">
						<button class="btn btn-default" id="editBtn4" name="editBtn4"><b>Edit</b></button>
					</div>
				</form>
				<table id="jqGrid" style="border:1px solid gray;"></table>
				<div id="jqGridPager" style="height:40px;"></div>
			</div>
			<!--End Right-->
		</div>
		<div class="col-md-12 col-xs-12" style="background-color:rgb(236,236,236);">
			<div class="col-md-6 col-md-offset-7" style="margin-top:10px; margin-bottom:10px;">
				<div class="col-md-3 col-xs-3"><button class="button" value="saveBtn" name="saveBtn" ><b>Save</b></button></div>
				<div class="col-md-3 col-xs-3"><button class="button" value="cancelBnt" name="cancelBnt" style="background-color:red;"><b>Hủy đơn</b></button></div>
				<div class="col-md-3 col-xs-3"><button class="button" value="closeBtn" name="closeBtn"><b>Close</b></button></div>
			</div>
		</div>
	</div>
</div>
</body>
<script src="{{asset('Scripts/K004/K004_2.js')}}"></script>

</html>