<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Bootstrap 3 Simple Tables</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style type="text/css">
	body
	{
		background:url(../assets/img/IMG_3151.JPG) fixed;
		background-size: cover;
		padding: 0;
		margin: 0;
	}
	p.brand-title
	{
		font-family: 'Open Sans' , sans-serif;
		font-size: 30px;
		font-weight: 600;
		text-align: center;
		color:rgb(16,54,103);
		text-transform: uppercase;
		letter-spacing: 4px;
	}
	.posted-by
	{
		position: absolute;
		bottom: 26px;
		margin: 0 auto;
		color: #FFF;
		background-color: rgba(0, 0, 0, 0.66);
		padding: 10px;
		left: 45%;
	}
	</style>
</head>
<body>
        <div class="container">
            <div class="row">
				<div class="col-md-12" style="margin-top:5%;background-color:rgb(236,236,236);">
					<p class="brand-title">Nhận phòng</p>
				</div>
				<div class="col-md-12" style="background-color:rgb(215,215,215);">
					<div class="col-md-4" style="margin-top:10px;">
						<form class="form-horizontal">
							<fieldset>
							<div class="form-group">
							  <label class="col-md-5 control-label" for="">Phòng:</label>  
							  <div class="col-md-3">
							  <input id="roomNo" name="roomNo" type="text" class="form-control input-md" readonly="readonly" style="background-color:rgb(194,194,194);">
							  </div>
							</div>
							<div class="form-group">
							  <label class="col-md-5 control-label" for="">Giá:</label>  
							  <div class="col-md-5">
							  <input id="price" name="price" type="text" class="form-control input-md">
							  </div>
							</div>
							<div class="form-group">
							  <label class="col-md-5 control-label" for="">Tên khách hàng:</label>  
							  <div class="col-md-6">
							  <input id="cusName" name="cusName" type="text" class="form-control input-md">
								
							  </div>
							</div>
							<div class="form-group">
							  <label class="col-md-5 control-label" for="">CMND:</label>  
							  <div class="col-md-6">
							  <input id="cmnd" name="cmnd" type="text" class="form-control input-md">
								
							  </div>
							</div>
							<div class="form-group">
							  <label class="col-md-5 control-label" for="">Điện thoại:</label>  
							  <div class="col-md-6">
							  <input id="phone" name="phone" type="text" class="form-control input-md">
							  </div>
							</div>
							<div class="form-group">
							  <label class="col-md-5 control-label" for="">Email:</label>  
							  <div class="col-md-6">
							  <input id="email" name="email" type="email" placeholder="xxx@gmail.com" class="form-control input-md">
							  </div>
							</div>
							<div class="form-group">
							  <label class="col-md-5 control-label" for="">Địa chỉ:</label>  
							  <div class="col-md-6">
							  <input id="address" name="address" type="text" class="form-control input-md">
							  </div>
							</div>
							<div class="form-group">
							  <label class="col-md-5 control-label" for="">Ghi chú:</label>  
							  <div class="col-md-6">
							  	<textarea rows="3" cols="30" id="note" name="note" autofocus maxlength="300"></textarea>
							  </div>
							</div>
							</fieldset>
						</form>
					</div>
					<div class="col-md-4" style="margin-top:10px;">
							<form class="form-horizontal">
								<fieldset>
								<div class="form-group">
								  <label class="col-md-4 control-label" for="">Ngày vào:</label>  
								  <div class="col-md-8">
								  <input id="checkin" name="checkin" type="datetime-local" class="form-control input-md">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-4 control-label" for="">Trả trước:</label>  
								  <div class="col-md-5">
								  <input id="prepay" name="prepay" type="text" class="form-control input-md">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-4 control-label" for="">Cơ quan:</label>  
								  <div class="col-md-6">
								  <input id="comName" name="comName" type="text" class="form-control input-md">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-4 control-label" for="">Ngày cấp:</label>  
								  <div class="col-md-8">
								  <input id="proDate" name="proDate" type="datetime-local" class="form-control input-md">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-4 control-label" for="">Quốc tịch:</label>  
								  <div class="col-md-6">
									<select id="country" name="country" style="width:155px;" class="form-control input-md">
									<option value="England">England</option>
									<option value="Korea">Korea</option>
									<option value="Japan">Japan</option>
									<option value="VietNam" selected>Việt Nam</option>
									</select>
								  </div>
								</div>
								</fieldset>
							</form>
					</div>
					<div class="col-md-4" style="margin-top:10px;">
							<form class="form-horizontal">
								<fieldset>
								<div class="form-group">
								  <label class="col-md-3 control-label" for="">Ngày ra:</label>  
								  <div class="col-md-8">
								  <input id="checkout" name="checkout" type="datetime-local" class="form-control input-md">
								  </div>
								</div>
								</fieldset>
							</form>
					</div>
				</div>
				<div class="col-md-12" style="background-color:rgb(236,236,236);">
						<div class="col-md-4 col-md-offset-8" style="margin-top:10px; margin-bottom:10px;">
							<button value="checkinBtn" name="checkinBtn"><b>Check-in</b></button>
							<button value="checkoutBtn" name="checkoutBtn"><b>Check-out</b></button>
							<button value="roomBtn" name="roomBtn"><b>Phòng</b></button>
						</div>
				</div>
            </div>
        </div>
</body>
</html>