<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bootstrap 3 Simple Tables</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/index.css')}}">
	<!-- The jQuery library is a prerequisite for all jqSuite products -->
	<script type="text/ecmascript" src="{{asset('jqgrid/js/jquery-1.11.0.min.js') }}"></script>
	<script src="{{asset('/css/index.css')}}"></script>
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
					<p class="brand-title">Đặt phòng trước</p>
				</div>
				<div class="col-md-12 col-xs-12" style="background-color:rgb(215,215,215);">
					<div class="col-md-7 col-xs-12" style="left:-40px;border-right:1px solid rgb(194,194,194);">
						<div class="col-md-6 col-xs-7" style="margin-top:10px;">
							<form class="form-horizontal">
								<fieldset>
								<div class="form-group">
								  <label class="col-md-5 control-label" for="">Ngày vào:</label>  
								  <div class="col-md-5" >
								  <input id="checkin" name="checkin" type="text" value="{{$checkin}}" class="form-control input-md get-date-time" readonly="readonly">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-5 control-label" for="">Ngày ra:</label>  
								  <div class="col-md-5">
								  <input id="checkout" name="checkout" value="{{$checkout}}" type="text" class="form-control input-md" readonly="readonly">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-5 control-label" for="">Tên khách hàng:</label>  
								  <div class="col-md-7">
								  <input id="txtcusName" name="txtcusName" value="{{$name}}" type="text" class="form-control input-md">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-5 control-label" for="">CMND:</label>  
								  <div class="col-md-7">
								  <input id="cmnd" name="cmnd" type="text" value="{{$idCard}}" class="form-control input-md">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-5 control-label" for="">Điện thoại:</label>  
								  <div class="col-md-7">
								  <input id="phone" name="phone" type="text" value="{{$phone}}" class="form-control input-md">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-5 control-label" for="">Email:</label>  
								  <div class="col-md-7">
								  <input id="email" name="email" type="email" value="{{$email}}" placeholder="" class="form-control input-md">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-5 control-label" for="">Địa chỉ:</label>  
								  <div class="col-md-7">
								  <input id="address" name="address" type="text" value="{{$address}}"class="form-control input-md">
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
								  <label class="col-md-4 control-label" for="">Cơ quan:</label>  
								  <div class="col-md-8">
								  <input id="company" name="company" value="{{$company}} "type="text" class="form-control input-md">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-4 control-label" for="">Ngày cấp:</label>  
								  <div class="col-md-8">
								  <input id="proDate" name="proDate" type="text" class="form-control input-md">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-4 control-label" for="">Quốc tịch:</label>  
								  <div class="col-md-6">
									<select id="country" name="country"  style="width:155px;" class="form-control input-md">
									</select>
								  </div>
								</div>
								</fieldset>
							</form>
						</div>
					</div>
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