    <!DOCTYPE html>
    <head>
    <meta charset="UTF-8">
    <title>K005-1</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href=" {{asset('css/index.css')}}">
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
				width: 20%;
				float:left;
			}
			.col3
			{
				width: 17%;
				float:left;
			}
			.col4
			{
				width: 10%;
				float:left;
			}
			.col5
			{
				width: 17%;
				float:left;
			}
			.col6
			{
				width: 20%;
				float:left;
			}
			.col7
			{
				width: 10%;
				float:left;
			}
		</style>
</head>
<body>
        <div class="container">
            <div class="row">
				<div class="col-md-8 col-md-offset-2" style="margin-top:3%;background-color:rgb(236,236,236);border:1px solid rgb(215,215,215);">
					<div class="row">
						<p class="brand-title">List room</p>
					</div>
				</div>
				<div class="col-md-8 col-md-offset-2" style="border:1px solid rgb(215,215,215); border-top:none;border-bottom:none;">
						<form class="form-inline col-md-offset-5" style="margin-top:20px;margin-bottom:20px;" method="POST" >
							<input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
							<label class="label1 control-label">Tầng:</label>
							<select id="searchfloor" name="searchfloor" style="width:56px;" class="form-control input-md">
								<option value="0" {!!  (isset($searchFloor) && $searchFloor == 0) ? 'selected':''  !!}>  </option>
								<option value="1" {!!  (isset($searchFloor) && $searchFloor == 1) ? 'selected':''  !!} > 1 </option>
								<option value="2" {!!  (isset($searchFloor) && $searchFloor == 2) ? 'selected':''  !!} > 2 </option>
								<option value="3" {!!  (isset($searchFloor) && $searchFloor == 3) ? 'selected':''  !!} > 3 </option>
								<option value="4" {!!  (isset($searchFloor) && $searchFloor == 4) ? 'selected':''  !!} > 4 </option>
								<option value="5" {!!  (isset($searchFloor) && $searchFloor == 5) ? 'selected':''  !!} > 5 </option>
								<option value="6" {!!  (isset($searchFloor) && $searchFloor == 6) ? 'selected':''  !!} > 6 </option>
								<option value="7" {!!  (isset($searchFloor) && $searchFloor == 7) ? 'selected':''  !!} > 7 </option>
								<option value="8" {!!  (isset($searchFloor) && $searchFloor == 8) ? 'selected':''  !!} > 8 </option>
								<option value="9" {!!  (isset($searchFloor) && $searchFloor == 9) ? 'selected':''  !!} > 9 </option>
							</select>

							<input id="searchtxt" name="searchtxt" type="text" class="form-control input-md" size="8" value="{!! isset($searchStr)?$searchStr:'' !!}">
							<button class="btn btn-default" value="searchBnt" name="searchBnt"><b>Search</b></button>
							<button class="btn btn-default"  type="button"  value="addBnt" name="addBnt" onclick="window.location='{{ url("/K005_1/K005_3?roomTypeID=" . '0') }}'" > <b>Add</b></button>
							<button class="btn btn-default" value="listallBnt" name="listallBnt"><b>List all</b></button>
						</form>
						<hr style="border-top: 1px solid gray;">
							@if(isset($room))
							<label> {!! 'Kết quả: '. sizeof($room) . ' bản ghi' !!} </label>
							@endif
						<?php $index =1;?>
						<table class="table table-hover">
							<thead>
							  <tr>
								<th class="col1">Stt</th>
								<th class="col2">RoomNumber</th>
								<th class="col3">RoomType</th>
								<th class="col4">Floor</th>
								<th class="col5">Price</th>
								<th class="col6">Description</th>
								<th class="col7">Status</th>
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
					<div class="col-md-2 col-md-offset-10" style="margin-top:10px; margin-bottom:10px;">
						<button class="btn btn-danger col-md-offset-2" value="backBtn" name="backBtn" onclick="window.history.back();" ><b>Back</b></button>
					</div>
				</div>
            </div>
        </div>
</body>
</html>