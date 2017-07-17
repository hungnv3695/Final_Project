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
		height: 110px;
		overflow-y: auto;
	}

	thead {
		/* fallback */
	}

	.col1
	{
		width: 10%;
		float:left;
	}
	.col2
	{
		width: 40%;
		float:left;
	}
	.col3
	{
		width: 25%;
		float:left;
	}
	.col4
	{
		width: 25%;
		float:left;
	}
	</style>
</head>
<body>
        <div class="container">
            <div class="row">
				<div class="col-md-10 col-md-offset-1" style="margin-top:3%;background-color:rgb(236,236,236);">
					<p class="brand-title">Chi tiết phòng</p>
				</div>
				<form  class="editroom" method="POST" >
					<div class="col-md-10 col-md-offset-1" style="background-color:rgb(215,215,215);">
						<div class="col-md-5 form-horizontal" style="border-right:1px solid rgb(236,236,236);">
							<div class="col-md-12 form-horizontal" style="border:2px solid rgb(200,200,200);margin:10px 0px 20px; height:310px;">
								<div class="form-group" style="margin-top:20px;">
									<label class="col-md-4 col-xs-4 control-label" for="">Kiểu phòng: </label>  
									<div class="col-md-5 col-xs-5">
										<select id="roomtype" name="roomtype" class="form-control input-md" style="width:140px;">
											@foreach($roomtype as $data)
												<option value="{!! array_get($data,'room_type_id') !!}"  {!!( array_get($data,'type_name') == array_get($roomTypeSelect[0],'type_name') )? 'selected':''  !!}  > {!! array_get($data,'type_name') !!}</option>
											@endforeach
										</select>
										<input id="txtroomType" name="txtroomType" type="hidden" class="form-control input-md"  value = "">
									</div>
								</div>
								<div class="form-group" style="margin-top:10px;">
									<label class="col-md-4 col-xs-4 control-label" for="">Số phòng: </label>  
									<div class="col-md-5 col-xs-5">
										<input id="txtRoomNo" name="txtRoomNo" type="text" class="form-control input-md" value="{!! $roomDetail[0]->room_number !!}" onclick="setDisableRoomType()">
									</div>
								</div>
								<div class="form-group" style="margin-top:10px;">
									<label class="col-md-4 col-xs-4 control-label" for="">Tầng: </label>  
									<div class="col-md-5 col-xs-5">
										<input id="floortxt" name="floortxt" type="text" class="form-control input-md" value="{!! $roomDetail[0]->floor !!}"  onclick="setDisableRoomType()" >
									</div>
								</div>
								<div class="form-group" style="margin-top:10px;">
									<label class="col-md-4 col-xs-4 control-label" for="">Trạng thái: </label>  
									<div class="col-md-5 col-xs-5">
										<select id="txtStatus" name="txtStatus" class="form-control input-md" style="width:140px;" onclick="setDisableRoomType()" >
											@foreach($status as $data)
												<option value="{!! array_get($data,'status_id') !!}"  {!! array_get($data,'status_name') == $roomDetail[0]->status_name ? 'selected':''  !!}> {!! array_get($data,'status_name') !!}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group" style="margin-top:10px;">
									<label class="col-md-4 col-xs-4 control-label" for="">Ghi chú: </label>  
									<div class="col-md-4 col-xs-4">
										<textarea rows="3" cols="25" id="txtNote" name="txtNote" autofocus maxlength="200" onclick="setDisableRoomType()"  onkeydown="setDisableRoomType()"> {!! $roomDetail[0]->note !!}</textarea>
									</div>
								</div>
							</div>
							<div class="col-md-7 col-md-offset-6" style="margin-top:55px;margin-bottom:10px;">
								<button class="roomlistBnt" value="bntAdd" name="bntSave" onclick="setDisableRoomType()"><b>Save</b></button>
								<button class="roomlistBnt" value="backAdd" name="backCancel" style="margin-left:5px;"><b>Cancel</b></button>
							</div>
							<input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
						</div>

						<!--right-->
						<div class="col-md-6">
							<div class="col-md-12 form-horizontal" style="width:530px;margin:10px 0px 10px;border: 2px solid rgb(200,200,200);">
								<div class="form-group" style="margin-top:20px;">
									<label class="col-md-4 col-xs-4 control-label" for="">Giá: </label>
									<div class="col-md-3 col-xs-3">
										<input id="txtPrice" name="txtPrice" type="text" class="form-control input-md"  value = "{!! array_get($roomTypeSelect[0],'price') !!}" readonly>
									</div>
									<label class="control-label" for="">/đêm</label>
								</div>
								<div class="form-group" style="margin-top:10px;">
									<label class="col-md-4 col-xs-4 control-label" for="">Người lớn: </label>
									<div class="col-md-3 col-xs-3">
										<input id="txtAdult" name="txtAdult" type="text" class="form-control input-md" value="{!! array_get($roomTypeSelect[0],'adult') !!}" readonly>
									</div>
									<label class="control-label" for="">/người</label>
								</div>
								<div class="form-group" style="margin-top:10px;">
									<label class="col-md-4 col-xs-4 control-label" for="">Trẻ em: </label>
									<div class="col-md-3 col-xs-3">
										<input id="txtAdult" name="txtAdult" type="text" class="form-control input-md" value="{!! array_get($roomTypeSelect[0],'children') !!}" readonly>
									</div>
									<label class="control-label" for="">/người</label>
								</div>
								<div class="form-group" style="margin-top:10px;">
									<label class="col-md-4 col-xs-4 control-label" for="">Miêu tả: </label>
									<div class="col-md-4 col-xs-4">
										<textarea rows="3" cols="30" id="txtDescription" name="notetxt" autofocus maxlength="200" style="background-color: rgb(236,236,236);"   readonly>{!! array_get($roomTypeSelect[0],'description') !!} </textarea>
									</div>
								</div>
								<table class="table table-hover">
									<thead>
									<tr>
										<th class="col1">Stt</th>
										<th class="col2">Accessory Name</th>
										<th class="col3">Quanlity</th>
										<th class="col4">Price </th>
									</tr>
									</thead>
									@if(isset($accessory))
										<tbody>
                                        <?php $i = 1?>
										@foreach($accessory as $data)
											<tr>
												<td class="col1">{!! $i !!}</td>
												<td class="col2">{!! array_get($data,'accessory_name') !!}</td>
												<td class="col3">{!! array_get($data,'quanlity') !!}</td>
												<td class="col4">{!! array_get($data,'price') !!}</td>
											</tr>
                                            <?php $i++?>
										@endforeach
										</tbody>
									@endif
								</table>
							</div>
						</div>

					</div>
				</form>


            </div>
        </div>

		<script>
            var select = document.getElementById('roomtype');
            select.onchange = function(){
                Route = "{!!url('/K005_1/K005_2/'. $roomDetail[0]->room_id)!!}" +'?roomTypeID='+ select.value ;
				window.location = Route
            };

			function setDisableRoomType() {
                select.disabled = true;
                document.getElementById('txtroomType').value = select.value;
            }

		</script>

</body>
</html>