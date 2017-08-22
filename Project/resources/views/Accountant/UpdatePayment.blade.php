<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Cập nhật tiền nộp</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{!! asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') !!} ">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css' ) }}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/index.css') !!} ">
	<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <style type="text/css">
	body
	{
		padding: 0;
		margin: 0;
	}
	.label1{
		width:130px;
		text-align:right;
	}
	.btnAccountant{
		background: #426EB4;
		color: #fff;
		height:40px;
		border-radius: 7px;
		border:none;
	}
	.btnAccountant:hover{
		background: #1B4F93;
		color: #fff;
	}
	p.accountant{
		font-family: Arial, Helvetica, sans-serif;
		font-weight:100;
		color:#FFFFFF;
		font-size:16px;
		line-height:35px;
		letter-spacing:1.2px;
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
	.charMoney{
		font-weight:100;
	}
	</style>
</head>
<body>
        <div class="container">
            <div class="row">
				<div class="col-md-8 col-md-offset-2" style="margin-top:5%;background-color:#c3bfc0;border-bottom:1px solid #898989;">
					<div class="row">
						<div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
							@if(Session::has('USER_INFO'))
							<b><a class="account" href=" {{url("/MyInfo")}}"><i class="fa fa-user"></i>{!!Session::get('USER_INFO')->user_name !!} </a></b>
							@endif
							<b>|</b><a class="logout" href="{!! url('LogOut') !!}"> Đăng xuất</a>
						</div>
						<div class="col-md-12">
							<p class="brand-title">Cập nhật tiền nộp</p>
						</div>
					</div>
				</div>
				<form method="post">
					<div class="col-md-8 col-md-offset-2" style="background-color:#c3bfc0;">						
						<div class="row">
							<div class="col-md-8 form-inline col-md-offset-2" style="border:1px solid #898989;border-radius:10px;margin-top:20px;margin-bottom:30px;">
								@if(Session::has('ErrorMSG'))
									<div class="Error" style="margin-top:10px;">
										<label id="ErrorMsg"> {!! Session::get('ErrorMSG')!!} </label>
									</div>
								@endif
								<div class="form-inline col-md-offset-1" style="margin-top:20px;">
									<label class="label1">Ngày:</label>
									<input id="txtDate" name="txtDate" type="text" class="form-control input-md" readonly value="{!! isset($date)?$date:"" !!}" size="25">
								</div>
								<div class="form-inline col-md-offset-1" style="margin-top:20px;">
									<label class="label1">Số tiền phải nộp của:</label>
									<input id="txtPayer" name="txtPayer" type="text" class="form-control input-md" readonly value="{!! isset($name)?$name:"" !!}"   size="25">
								</div>
								<div class="form-inline col-md-offset-1" style="margin-top:20px;">
									<label class="label1">là:</label>
									<input id="txtMoney" name="txtMoney" type="text" class="form-control input-md" readonly value="{!! isset($total)?(int)$total:"" !!}"  size="20">
									<label class="control-label">(VNĐ)</label>
								</div>
								<div class="form-inline col-md-offset-1" style="margin-top:20px;">
									<label class="label1">Số tiền đã nhận:</label>
									<input id="txtMoneyReceived" name="txtMoneyReceived" maxlength="13" oninput="formatCurency(this,1); " type="text" class="form-control input-md" size="20">
									<label class="control-label">(VNĐ)</label>
								</div>
								<div class="form-inline col-md-offset-1" style="margin-top:10px;">
									<label class="charMoney control-label" for="" id="charMoney"></label>
								</div>
								<div class="form-inline col-md-offset-8" style="margin-top:30px;margin-bottom:10px;">
									<button class="btn btn-success col-md-offset-1" value="btnSave" name="btnSave"><b>Lưu</b></button>
									<button type="button" class="btn btn-danger" value="btnBack" name="btnBack" onclick="window.location='{{ url("/AccountantList") }}'"  ><b>Quay lại</b></button>
								</div>
							</div>
						</div>
					</div>
					<input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
				</form>
            </div>
        </div>

		<script>
            function addCommas(nStr)
            {
                nStr += '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(nStr)) {
                    nStr = nStr.replace(rgx, '$1' + '.' + '$2');
                }
                return nStr;
            }

            function formatMoney() {

                var txt = document.getElementById('txtMoney')
                txt.value = addCommas(txt.value) ;
            }

            formatMoney();
		</script>
		<script src="{!! asset('Scripts/ReadNumber/readNumber.js') !!}"> </script>
		<script>  $("div.Error").delay(2000).slideUp(); </script>
</body>
</html>