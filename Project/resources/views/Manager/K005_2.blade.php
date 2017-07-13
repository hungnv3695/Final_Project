<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>K005-2</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{!! asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') !!}">
	<link rel="stylesheet" type="text/css" href=" {!! asset('css/index.css') !!}">
    <style type="text/css">
	body
	{
		padding: 0;
		margin: 0;
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
		height: 185px;
		overflow-y: auto;
	}

	thead {
		/* fallback */
	}

	.colStt
	{
		width: 20%;
		float:left;
	}
	.colRoNo
	{
		width: 40%;
		float:left;
	}
	.colRoType
	{
		width: 40%;
		float:left;
	}
	</style>
</head>
<body>
        <div class="container">
            <div class="row">
				<div class="col-md-10 col-md-offset-1" style="margin-top:3%;background-color:rgb(236,236,236);">
					<p class="brand-title">Room Detail</p>
				</div>
				<form  class="editroom" method="POST" >
					<div class="col-md-10 col-md-offset-1" style="background-color:rgb(215,215,215);">
						<div class="col-md-6 form-horizontal" style="border-right:1px solid rgb(236,236,236);">
							<div class="col-md-12" style="border:2px solid rgb(200,200,200);margin:10px 0px 10px;">
								<div class="form-group" style="margin-top:20px;">
									<label class="col-md-3 col-xs-4 control-label" for="">Phòng:</label>
									<div class="col-md-3 col-xs-3">
										<input id="roomtxt" name="roomtxt" type="text" class="form-control input-md" value="{!! $roomDetail[0]->room_number !!}" >
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-xs-4 control-label" for="">Kiểu phòng:</label>
									<div class="col-md-4 col-xs-4">
										<select class="selectpicker form-control" name = ' roomtype' id="roomtype">
											@foreach($roomtype as $data)
												<option value="{!! array_get($data,'room_type_id') !!}"  {!!( array_get($data,'type_name') == array_get($roomTypeSelect[0],'type_name') )? 'selected':''  !!}  > {!! array_get($data,'type_name') !!}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-xs-4 control-label" for="">Tầng:</label>
									<div class="col-md-4 col-xs-5">
										<input id="floortxt" name="floortxt" type="text" class="form-control input-md" value="{!! $roomDetail[0]->floor !!}" >
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-xs-4 control-label" for="">Giá:</label>
									<div class="col-md-5 col-xs-5">
										<input id="daypricetxt" name="daypricetxt" type="text" class="form-control input-md" value="{!! array_get($roomTypeSelect[0],'price') !!}" readonly>
									</div>
									<label class="control-label">/đêm</label>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-xs-4 control-label" for="">Trạng thái:</label>
									<div class="col-md-4 col-xs-4">
										<select class="selectpicker form-control" name = ' status' >
											@foreach($status as $data)
												<option value="{!! array_get($data,'status_id') !!}"  {!! array_get($data,'status_name') == $roomDetail[0]->status_name ? 'selected':''  !!}> {!! array_get($data,'status_name') !!}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group" style="margin-bottom:50px;">

									<label class=" col-md-3 col-xs-4 control-label">Ghi chú: </label>
									<div class="col-md-6 col-xs-6">
										<textarea rows="3" cols="30" id="notetxt" name="notetxt" autofocus maxlength="300"></textarea>
									</div>


								</div>
							</div>
						</div>

						<div class="col-md-5 form-horizontal" style="margin:10px 0px 10px 10px;border: 2px solid rgb(200,200,200);width:450px;">
								<table class="table table-hover" style="margin-top:10px;" readonly>
									<thead>
									  <tr>
										<th class="colStt">Stt</th>
										<th class="colRoNo">RoomNumber</th>
										<th class="colRoType">RoomType</th>
									  </tr>
									</thead>
									<tbody>
									  <tr>
										<td class="colStt">1</td>
										<td class="colRoNo">101</td>
										<td class="colRoType">Double</td>
									  </tr>
									</tbody>
								</table>
								<label class="control-label" for="">Miêu tả:</label>
							    <textarea rows="4" cols="56" id="descriptiontxt" name="descriptiontxt" autofocus maxlength="300" readonly style="background-color: rgb(230,230,230);"> {!! array_get($roomTypeSelect[0],'description') !!}</textarea>
						</div>

					</div>
					<div class="col-md-10 col-md-offset-1" style="background-color:rgb(236,236,236);">
						<div class="col-md-offset-9" style="margin-top:10px; margin-bottom:10px;">
							<button class="button" value="saveBtn" name="saveBtn" ><b>Save</b></button>
							<button class="button" value="cancelBtn" name="cancelBtn" ><b>Cancel</b></button>
						</div>
					</div>
					<input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
				</form>


            </div>
        </div>

		<script>
            var select = document.getElementById('roomtype');
            select.onchange = function(){
                Route = "{!!url('/K005_1/K005_2/'. $roomDetail[0]->room_id)!!}" +'?roomTypeID='+ select.value ;
				window.location = Route
            };
		</script>

</body>
</html>