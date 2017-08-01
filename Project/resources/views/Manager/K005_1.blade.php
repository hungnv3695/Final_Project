    <!DOCTYPE html>
    <head>
    <meta charset="UTF-8">
    <title>Danh sách phòng</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href=" {{asset('css/index.css')}}">
	<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<style>
			body{
				padding:0;
				margin:0;
			}
			table {
				width: 100%;
				border:1px solid rgb(200,200,200);
			}

			thead, tbody, tr, td, th { display: block; }

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
				height: 190px;
				overflow-y: auto;
			}

			thead {
				/* fallback */
			}


			tbody td, thead th {
				width: 14%;
				float: left;
			}
			.col1
			{
				width: 5%;
				float:left;
			}
			.col2
			{
				width: 15%;
				float:left;
			}
			.col3
			{
				width: 15%;
				float:left;
			}
			.col4
			{
				width: 15%;
				float:left;
			}
			.col5
			{
				width: 15%;
				float:left;
			}
			.col6
			{
				width: 20%;
				float:left;
			}
			.col7
			{
				width: 15%;
				float:left;
			}
		</style>
</head>
<body>
        <div class="container">
            <div class="row">
				<div class="col-md-8 col-md-offset-2" style="margin-top:3%;background-color:rgb(236,236,236);border:1px solid rgb(215,215,215);">
					<div class="row">
						<div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
							@if(Session::has('USER_INFO'))
								<b><a class="account" style="text-decoration:none;" href=" {{url("/K012")}}">{!!Session::get('USER_INFO')->user_name !!} </a></b>
							@endif
							<b>|</b><a href="{!! url('/K001/LogOut') !!}"><b> Đăng xuất</b></a>
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
				<div class="col-md-8 col-md-offset-2" style="background-color:rgb(230,230,230);border:1px solid rgb(215,215,215); border-top:none;border-bottom:none;">
						<form class="form-inline col-md-offset-4" style="margin-top:20px;margin-bottom:20px;" method="POST" >	
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

							<input id="searchtxt" name="searchtxt" type="text" class="form-control input-md" size="12" value="{!! isset($searchStr)?$searchStr:'' !!}">
							<button class="btn btn-default" value="btnSearch" name="btnSearch"><b>Tìm</b></button>
							<button class="btn btn-default"  type="button"  value="btnAdd" name="btnAdd" onclick="window.location='{{ url("/K005_1/K005_3?roomTypeID=" . '0') }}'" > <b>Thêm mới</b></button>
							<button class="btn btn-default" value="btnListall" name="btnListall"><b>Danh sách</b></button>
						</form>
						<hr style="border-top: 1px solid gray;">
							@if(isset($room))
							<label> {!! 'Kết quả: '. sizeof($room) . ' bản ghi' !!} </label>
							@endif
						<?php $index =1;?>
						<table class="table table-hover">
							<thead>
							  <tr>
								<th class="col1">STT</th>
								<th class="col2">Số phòng</th>
								<th class="col3">Loại phòng</th>
								<th class="col4">Tầng</th>
								<th class="col5">Giá</th>
								<th class="col6">Miêu tả</th>
								<th class="col7">Trạng thái</th>
							  </tr>
							</thead>
							<tbody>
							@if(isset($room))
								@foreach($room as $data)
									<tr>
										<td class="col1"> {{$index}} </td>
										<td class="col2"> <a href= {!! url('/K005_1/K005_2/' . $data->room_id) . '?roomTypeID=' . $data->room_type_id !!} > {{$data->room_number}}  </a>  </td>
										<td class="col3">{{$data->type_name}}</td>
										<td class="col4">{{$data->floor}}</td>
										<td class="col5">{{$data->price}}</td>
										<td class="col6"> {{$data->description }}</td>
										<td class="col7">{{$data->status_name}}</td>
									</tr>
									<?php $index ++;?>
								@endforeach
							@endif
							</tbody>
						</table>
				</div>
				<div class="col-md-8 col-md-offset-2" style="background-color:rgb(236,236,236);border:1px solid rgb(215,215,215);">
					<div class="col-md-3 col-md-offset-9" style="margin-top:10px; margin-bottom:10px;">
						<button type="button" class="btn btn-danger col-md-offset-6" value="btnBack" name="btnBack" onclick="window.location='{{ url("/K002") }}'" ><b>Quay lại</b></button>
					</div>
				</div>
            </div>
        </div>
		<script>  $("div.alert").delay(2000).slideUp(); </script>
</body>
</html>