@foreach($room as $data)
    <p>{{$data->room_id}}  {{$data->type_name}}  {{$data->floor}}   {{$data->price}} {{$data->description }}  {{$data->status }} </p>  <a href= {!! url('/K005_1/K005_2/' . $data->room_id) !!} "> Update </a> <br>
@endforeach


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>K005-1</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
    <style type="text/css">
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
				<div class="col-md-8 col-xs-8 col-md-offset-2" style="margin-top:2%;background-color:rgb(236,236,236);">
					<p class="brand-title">List room</p>
				</div>
				<div class="col-md-8 col-xs-8 col-md-offset-2" style="background-color:rgb(215,215,215);">
					<form class="form-inline col-md-offset-7" style="margin-top:10px;margin-bottom:20px;">
						<input id="searchtxt" name="searchtxt" type="text" class="form-control input-md" size="8">
						<button class="btn btn-default" value="searchBnt" name="searchBnt"><b>Search</b></button>
						<button class="btn btn-default" value="addBnt" name="addBnt"><b>Add</b></button>
						<button class="btn btn-default" value="listallBnt" name="listallBnt"><b>List all</b></button>
					</form>
						<label>2 bản ghi</label>
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
						  <tr>
							<td>1</td>
							<td>101</td>
							<td>Doe</td>
							<td>john@example.com</td>
							<td>John</td>
							<td>Doe</td>
							<td>john@example.com</td>
						  </tr>
						</tbody>
					 </table>
				</div>
				<div class="col-md-8 col-xs-8 col-md-offset-2" style="background-color:rgb(236,236,236);">
						<div class="col-md-2 col-md-offset-9" style="margin-top:10px; margin-bottom:10px;">
							<button class="button" value="backBtn" name="backBtn" ><b>Back</b></button>
						</div>
				</div>
            </div>
        </div>
		
</body>
</html>