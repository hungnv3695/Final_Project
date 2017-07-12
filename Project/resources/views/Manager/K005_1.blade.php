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
		</style>
</head>
<body>
        <div class="container">
            <div class="row">
				<div class="col-md-8 col-xs-8 col-md-offset-2" style="margin-top:2%;background-color:rgb(236,236,236);">
					<p class="brand-title">List room</p>
				</div>
				<div class="col-md-8 col-xs-8 col-md-offset-2" style="background-color:rgb(215,215,215);">
					<form class="form-inline col-md-offset-7" style="margin-top:10px;margin-bottom:20px;" method="POST" >
                        <input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
						<select class="form-inline col-md-offset-7" name = 'searchfloor'>
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
						@if(isset($room))
						<label> {!! 'Kết quả: '. sizeof($room) . ' bản ghi' !!} </label>
						@endif
                    <?php $index =1;?>
					<table class="table table-hover">
						<thead>
						  <tr>
							<th>Stt</th>
							<th>RoomNumber</th>
							<th>RoomType</th>
							<th>Floor</th>
							<th>Price</th>
							<th>Description</th>
							<th>Status</th>
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
				<div class="col-md-8 col-xs-8 col-md-offset-2" style="background-color:rgb(236,236,236);">
						<div class="col-md-2 col-md-offset-9" style="margin-top:10px; margin-bottom:10px;margin-left:617px;">
							<button class="button" value="backBtn" name="backBtn" onclick="window.history.back();" ><b>Back</b></button>
						</div>
				</div>
            </div>
        </div>
</body>
</html>