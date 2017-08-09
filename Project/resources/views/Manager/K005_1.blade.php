    <!DOCTYPE html>
    <head>
    <meta charset="UTF-8">
    <title>Danh sách phòng</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css' ) }}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href=" {{asset('css/index.css')}}">
	<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
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
							<p class="brand-title">Danh sách phòng</p>
						</div>
					</div>
					@if(Session()->has('SuccessMSG'))
						<div class="alert alert-success">
							{!! Session()->get('SuccessMSG') !!}
						</div>
					@endif
				</div>
				<div class="col-md-8 col-md-offset-2" style="background-color:#c3bfc0;border-bottom:1px solid #898989;">
						<form class="form-inline col-md-offset-4" style="margin-top:20px;" method="POST" >	
							<input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
							<label class="control-label">Tầng:</label>
							<select id="searchfloor" name="searchfloor" style="width:56px;" class="form-control input-md" autofocus>
								<option value="0" {!!  (isset($searchFloor) && $searchFloor == 0) ? 'selected':''  !!}>  </option>
								<option value="1" {!!  (isset($searchFloor) && $searchFloor == 1) ? 'selected':''  !!} > 1 </option>
								<option value="2" {!!  (isset($searchFloor) && $searchFloor == 2) ? 'selected':''  !!} > 2 </option>
								<option value="3" {!!  (isset($searchFloor) && $searchFloor == 3) ? 'selected':''  !!} > 3 </option>
								<option value="4" {!!  (isset($searchFloor) && $searchFloor == 4) ? 'selected':''  !!} > 4 </option>
								<option value="5" {!!  (isset($searchFloor) && $searchFloor == 5) ? 'selected':''  !!} > 5 </option>
							</select>

							<input id="searchtxt" name="searchtxt" type="text" placeholder="Tìm kiếm..." class="form-control input-md" size="12" value="{!! isset($searchStr)?$searchStr:'' !!}">
							<button class="btn btn-default" value="btnSearch" name="btnSearch"><b>Tìm</b></button>
							<button class="btn btn-default"  type="button"  value="btnAdd" name="btnAdd" onclick="window.location='{{ url("/K005_1/K005_3?roomTypeID=" . '0') }}'" > <b>Thêm mới</b></button>
							<button class="btn btn-default" value="btnListall" name="btnListall"><b>Danh sách</b></button>
						</form>
						<div class="row"><hr></div>
							@if(isset($room))
							<label> {!! 'Kết quả: '. sizeof($room) . ' bản ghi' !!} </label>
							@endif
						<?php $index =1;?>
						<div class="table-wrapper">
							<div class="table-scroll">
								<table class="table table-bordered">
									<thead>
									  <tr>
										<th>STT</th>
										<th>Số phòng</th>
										<th>Loại phòng</th>
										<th>Tầng</th>
										<th>Giá</th>
										<th>Miêu tả</th>
										<th>Trạng thái</th>
									  </tr>
									</thead>
									<tbody>
									@if(isset($room))
										@foreach($room as $data)
											<tr>
												<td> {{$index}} </td>
												<td> <a href= {!! url('/K005_1/K005_2/' . $data->room_id) . '?roomTypeID=' . $data->room_type_id !!} > {{$data->room_number}}  </a>  </td>
												<td>{{$data->type_name}}</td>
												<td>{{$data->floor}}</td>
												<td>{{$data->price}}</td>
												<td> {{$data->description }}</td>
												<td>{{$data->status_name}}</td>
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
					<div class="col-md-3 col-md-offset-9" style="margin-top:10px; margin-bottom:10px;">
						<button type="button" class="btn btn-danger col-md-offset-6" value="btnBack" name="btnBack" onclick="window.location='{{ url("/K002") }}'" ><b>Quay lại</b></button>
					</div>
				</div>
            </div>
        </div>
		<script>  $("div.alert").delay(2000).slideUp(); </script>
</body>
</html>