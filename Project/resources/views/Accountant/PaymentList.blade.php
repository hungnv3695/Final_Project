<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Quản lý tiền thu của lễ tân</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{!! asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') !!} ">
	<link rel="stylesheet" type="text/css" href="{!! asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') !!} ">
	<link rel="stylesheet" type="text/css" href="{!! asset('plugins/animate/animate.css') !!} ">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/index.css') !!} ">

	<!--  jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

	<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
	<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

	<!-- Bootstrap Date-Picker Plugin -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	<style>
		body
		{
			padding:0;
			margin:0;
		}
		hr
		{
			background-color:#898989;
			height:1px; 
			border: 0;
		}
		.table-wrapper 
		{
			position:relative;
		}
		.table-scroll 
		{
			height:225px;
			overflow:auto; 
			margin-top:20px;	  
			margin-bottom:20px;
		}
		.table-wrapper table 
		{
			width:100%;
		}
		.table-wrapper table thead th .text 
		{
			position:absolute;   
			top:-20px;
			z-index:2;
			height:20px;
			width:35%;
			border:1px solid red;
		}
	</style>   
</head>
<body>
        <div class="container">
            <div class="row">
				<div class="col-md-8 col-md-offset-2" style="margin-top:3%;background-color:#c3bfc0;border-bottom:1px solid #898989;">
					<div class="row">
						<div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
							@if(Session::has('USER_INFO'))
							<b><a class="account" href=" {{url("/K012")}}"><i class="fa fa-user"></i>{!!Session::get('USER_INFO')->user_name !!} </a></b>
							@endif
							<b>|</b><a class="logout" href="{!! url('/K001/LogOut') !!}"> Đăng xuất</a>
						</div>
						<div class="col-md-12">
							<p class="brand-title">Quản lý tiền thu của lễ tân</p>
						</div>
					</div>
						@if(Session()->has('SuccessMSG'))
							<div class="alert alert-success">
								{!! Session()->get('SuccessMSG') !!}
							</div>
						@endif
				</div>
				<div class="col-md-8 col-md-offset-2" style="background-color:#c3bfc0;border-bottom:1px solid #898989;">
					<form method="post">
						<div class="row">
							<div class="form-inline col-md-offset-1" style="margin-top:20px;">
								<label class="control-label">Ngày:</label>
								<input class="form-control" id="date" name="date" placeholder="YYYY/MM/DD" type="text" oninvalid="InvalidMsg(this);" required/>
								<button class="btn btn-default" value="btnSearch" name="btnSearch"><b>Tìm</b></button>
							</div>
						</div>
						<input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
					</form>

						<div class="row"><hr></div>
					@if(isset($accountantList))
						<label> {!! 'Kết quả: '. sizeof($accountantList) . ' bản ghi' !!} </label>
					@endif
                    <?php $index =1;?>
						<div class="table-wrapper">
							<div class="table-scroll">
								<table class="table table-bordered" id="table">
									<thead>
									  <tr>
										<th></th>
										<th>Tên nhân viên</th>
										<th>Tổng số hóa đơn</th>
										<th>Ngày</th>
										<th>Tổng tiền</th>
										<th>Trạng thái</th>
									  </tr>
									</thead>
									<tbody>
									@if(isset($accountantList))
										@foreach($accountantList as $data)
											<tr>
												<td> {{$index}} </td>
												<td> {!! $data->updater_nm !!} </td>
												<td>{{$data->count}}</td>
												<td>{{$data->update_ymd}}</td>
												<td id="{!! "price".$index !!}">{{(int)$data->sum}}</td>
												@if($statusList[$index-1] == 1) <td>Đã thanh toán</td>
												@else
													<td> <a href= "{!! url('/UpdatePayment?name='. $data->updater_nm . '&date=' . $data->update_ymd . '&total=' . $data->sum   ) !!}" > Chưa Thanh Toán  </a> </td>
												@endif
											</tr>
                                            <?php $index ++;?>
										@endforeach
									@endif
									</tbody>
								</table>
							</div>
						</div>
				</div>
				<div class="col-md-8 col-md-offset-2" style="background-color:#c3bfc0;">
					<div class="row">
						<div class="col-md-3 col-md-offset-9" style="margin-top:10px; margin-bottom:10px;">
							<button type="button" class="btn btn-danger col-md-offset-6" value="btnBack" name="btnBack" onclick="window.location='{{ url("/SeparateGroup") }}'"  ><b>Quay lại</b></button>
						</div>
					</div>
				</div>
            </div>
        </div>
		<script>
            $(document).ready(function(){
                var date_input=$('input[id="date"]'); //our date input has the name "date"
                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                var options={
                    format: 'yyyy/mm/dd',
                    container: container,
                    todayHighlight: true,
                    autoclose: true,
                };
                date_input.datepicker(options);
            })
		</script>

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
                var count = document.getElementById('table').rows.length - 1;

                for(var i = 1; i<=count ;i ++){
                    var name = 'price' + i;
                    var txt = document.getElementById(name);
                    txt.innerHTML = addCommas(txt.innerHTML);
                }
            }

            formatMoney();

		</script>
		<script src="{!! asset('Scripts/FrontCheck/CheckError.js') !!}"> </script>
		<script>  $("div.alert").delay(2000).slideUp(); </script>
		
</body>
</html>