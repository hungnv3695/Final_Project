<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>View Room type</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<style type="text/css">
		body
		{
			padding: 0;
			margin: 0;
		}
		.label1
		{
			width : 80px;
			text-align:right;
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
			height: 200px;
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
	<form class="editRoomType" method="post" id="editRoomType" onsubmit="return checkvalue();" >
		<div class="row">
			<div class="col-md-10 col-md-offset-1" style="margin-top:3%;background-color:rgb(236,236,236);">
				<p class="brand-title">Xem kiểu phòng</p>
			</div>
			<div class="col-md-10 col-md-offset-1" style="background-color:rgb(215,215,215);">
				<div class="col-md-12 form-inline" style="margin-top:20px;margin-bottom:10px;">
					<label class="control-label">Chọn Kiểu phòng:</label>
					<select id="txtRoomtype" name="txtRoomtype" class="form-control input-md" style="width:140px;">
						<option value="0">{!! " " !!}</option>
						@foreach($roomtype as $data)
							<option value="{!! array_get($data,'room_type_id') !!}" {!!(isset($roomTypeSelect[0]) && array_get($data,'type_name') == array_get($roomTypeSelect[0],'type_name') )? 'selected':''  !!} > {!! array_get($data,'type_name') !!}</option>
						@endforeach
					</select>
					<input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
					<button type="button" class="roomlistBnt" value="bntEdit" id = "bntEdit" name="bntEdit"><b>Sửa</b></button>
					<button type="button" class="roomlistBnt" value="btnAddNew" id = "btnAdd" name="btnAdd" onclick="window.location='{{ url("/K010_1") }}'" ><b>Thêm Mới</b></button>
					<hr style="border-top: 1px solid gray;">
				</div>

				<!--left-->
				<div class="col-md-6" style="border-right:1px solid rgb(236,236,236);  "  >
					<div class="col-md-12 form-horizontal" style="border:2px solid rgb(200,200,200);margin-top:20px;margin-bottom:50px;" id="leftDiv" >
						<div class="form-group" style="margin-top:30px;">
							<label class="col-md-4 col-xs-4 control-label" for="">ID: </label>
							<div class="col-md-4 col-xs-4">
								<input id="txtRoomTypeID" name="txtRoomTypeID" type="text" class="form-control input-md" value= " {!! isset($roomTypeSelect[0])? array_get($roomTypeSelect[0],'room_type_id'):"" !!} " readonly >
							</div>
						</div>
						<div class="form-group" style="margin-top:10px;">
							<label class="col-md-4 col-xs-4 control-label" for="">Tên Loại Phòng:</label>
							<div class="col-md-6 col-xs-6">
								<input id="txtFullname" name="txtFullname" type="text" class="form-control input-md" value= " {!! isset($roomTypeSelect[0])? array_get($roomTypeSelect[0],'type_name'):"" !!} " required>
							</div>
						</div>

						<div class="form-group" style="margin-top:10px;">
							<label class="col-md-4 col-xs-4 control-label" for="">Giá: </label>
							<div class="col-md-4 col-xs-4">
								<input id="txtPrice" name="txtPrice" type="number" class="form-control input-md" value= "{!!isset($roomTypeSelect[0])?(int)array_get($roomTypeSelect[0],'price'):'0'!!}" required >
							</div>
							<label class="control-label" for="">/đêm</label>
						</div>

						<div class="form-group" style="margin-top:10px;">
							<label class="col-md-4 col-xs-4 control-label" for="">Người lớn: </label>
							<div class="col-md-4 col-xs-4">
								<input id="txtAdult" name="txtAdult" type="number" class="form-control input-md" value= "{!! isset($roomTypeSelect[0])?(int) array_get($roomTypeSelect[0],'adult'):'0'!!}" required>
							</div>
							<label class="control-label" for="">/người</label>
						</div>
						<div class="form-group" style="margin-top:10px;">
							<label class="col-md-4 col-xs-4 control-label" for="">Trẻ em: </label>
							<div class="col-md-4 col-xs-4">
								<input id="txtChildren" name="txtChildren" type="number" class="form-control input-md" value= "{!!isset($roomTypeSelect[0])?(int) array_get($roomTypeSelect[0],'children'):'0'!!}" required>
							</div>
							<label class="control-label" for="">/người</label>
						</div>
						<div class="form-group" style="margin-bottom:50px;">
							<label class="col-md-4 col-xs-4 control-label" for="">Miêu tả:</label>
							<div class="col-md-6 col-xs-6">
								<textarea rows="3" cols="30" id="descriptiontxt" name="descriptiontxt" autofocus maxlength="300" required> {!! isset($roomTypeSelect[0])? array_get($roomTypeSelect[0],'description'):"" !!} </textarea>
							</div>
						</div>
					</div>
				</div>
				<!--right-->
				<div class="col-md-5">
					<div class="col-md-12 form-horizontal" style="width:450px;border: 2px solid rgb(200,200,200);margin-top:20px;margin-bottom:50px;">
						<div class="col-md-12" style="margin-top:30px;margin-bottom:10px;">
							<label>Thiết Bị: </label>
						</div>
						<table class="table table-hover" style="margin-bottom:56px;" id="table">
							<thead>
							<tr>
								<th class="col1">Stt</th>
								<th class="col2">Tên Thiết bị</th>
								<th class="col3">Số Lượng</th>
								<th class="col4">Giá</th>
							</tr>
							</thead>
							<tbody>
							@if(isset($accessory))
                                <?php $i = 1?>
								@foreach($accessory as $data)
									<tr>
                                        <?php ($i==1)?$str="":$str=$i-1; ?>

										<td class="col1">{!! $i !!}</td>
										<td class="col2"> <input id="txtNameAcc1" name="{!! "txtNameAcc" . $str !!}"   type="text" class="form-control input-md" value=" {!!array_get($data,'accessory_name')!!}" ></td>
										<td class="col3"> <input id="txtQuanlityAcc1" name="{!! "txtquanlityAcc" . $str !!}" type="number" class="form-control input-md" value="{!!(int)array_get($data,'quanlity') !!}" ></td>
										<td class="col4"> <input id="txtPriceAcc1" name="{!! "txtPriceAcc" . $str !!}" type="number" class="form-control input-md" value="{!! (int)array_get($data,'price') !!}"  ></td>
									</tr>
                                    <?php $i++?>
								@endforeach
							@endif
							</tbody>
						</table>
						<button type="button" class="roomlistBnt col-md-offset-10" value="bntAdd" name="bntAdd" onclick="addAccessory()" ><b>Add</b></button>
						<button type="button" class="roomlistBnt col-md-offset-10" value="bntDelete" name="bntDelete" onclick="deleteAccessory()" ><b>Delete</b></button>
					</div>
				</div>

			</div>
			<input type="hidden"  id="count" name = "count" value=""  />
			<input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
			<div class="col-md-10 col-md-offset-1" style="background-color:rgb(236,236,236);">
				<div class="col-md-5 col-md-offset-9" style="margin-top:10px; margin-bottom:10px;">
					<button type="submit" class="roomlistBnt" value="bntAddType" id="bntAddType" name="bntSave" ><b>Save</b></button>
					<button type="button" class="roomlistBnt" value="bntBack" name="bntBack"><b>Back</b></button>
				</div>
			</div>
		</div>
	</form>

</div>
<script src="{{asset('Scripts/K010/K010.js')}}"> </script>

<script>

	var btn = document.getElementById('bntEdit');
	var select = document.getElementById('txtRoomtype');
	btn.onclick = function () {
		Route = "{!!url('/K010_2')!!}" +"?roomTypeID=" + select.value ;
        window.location = Route

		return true;
    }

    function checkvalue() {
        var selectValue = document.getElementById('txtRoomTypeID').value;

        if(selectValue.trim() ==""){
            alert("Vui lòng chọn loại phòng và edit");
            return false;
        }else{
            return true;
		}
    }


</script>

</body>
</html>