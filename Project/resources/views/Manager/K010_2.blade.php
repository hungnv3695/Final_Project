<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Xem kiểu phòng</title>
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
			width : 100px;
			text-align:right;
		}
		.label2{
			width:60px;
			line-height:30px;
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
		.col5
		{
			width: 10%;
			float:left;
		}
	</style>
</head>
<body>
<div class="container">
	<form class="editRoomType" method="post" id="editRoomType" onsubmit="return checkvalue();" >
		<div class="row">
			<div class="col-md-12" style="margin-top:2%;background-color:rgb(236,236,236);border:1px solid rgb(215,215,215);">
				<div class="row">
					<div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
						@if(Session::has('USER_INFO'))
						<p class="account">{!! "Xin chào " . Session::get('USER_INFO')->user_name !!} </p>
						@endif
						<b>|</b><a href="{!! url('/K001/LogOut') !!}"><b> Đăng suất</b></a>
					</div>
					<div class="col-md-12">
						<p class="brand-title">Xem kiểu phòng</p>
					</div>
				</div>
			</div>
			<div class="col-md-12" style="background-color:rgb(230,230,230);border:1px solid rgb(215,215,215); border-top:none;border-bottom:none;">
				<div class="row">
					<div class="col-md-12 form-inline" style="margin-top:20px;margin-bottom:10px;">
						<label class="control-label">Chọn kiểu phòng:</label>
						<select id="txtRoomtype" name="txtRoomtype" class="form-control input-md" style="width:140px;">
							<option value="0">{!! " " !!}</option>
							@foreach($roomtype as $data)
								<option value="{!! array_get($data,'room_type_id') !!}" {!!(isset($roomTypeSelect[0]) && array_get($data,'type_name') == array_get($roomTypeSelect[0],'type_name') )? 'selected':''  !!} > {!! array_get($data,'type_name') !!}</option>
							@endforeach
						</select>
						<input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
						<button type="button" class="btn btn-default" value="bntEdit" id = "bntEdit" name="bntEdit"><b>Xem</b></button>
						<button type="button" class="btn btn-default" value="btnAddNew" id = "btnAdd" name="btnAdd" onclick="window.location='{{ url("/K010_1") }}'" ><b>Thêm mới</b></button>
						<hr style="border-top: 1px solid gray;">
					</div>

					<!--left-->
					<div class="col-md-5 form-horizontal" style="margin:10px 30px 10px;border: 2px solid rgb(220,220,220);border-radius:10px;" id="leftDiv">
							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Mã: </label>
								<input id="txtRoomTypeID" name="txtRoomTypeID" type="text" class="form-control input-md" size="10" maxlength="5" value= " {!! isset($roomTypeSelect[0])? array_get($roomTypeSelect[0],'room_type_id'):"" !!} " readonly >
							</div>
							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Tên loại phòng:</label>
								<input id="txtFullname" name="txtFullname" type="text" class="form-control input-md" size="15" maxlength="30" value= " {!! isset($roomTypeSelect[0])? array_get($roomTypeSelect[0],'type_name'):"" !!} " oninvalid="InvalidMsg(this);" required>
							</div>

							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Giá: </label>
								<input id="txtPrice" name="txtPrice" type="number" class="form-control input-md" default="0" min="0" value= "{!!isset($roomTypeSelect[0])?(int)array_get($roomTypeSelect[0],'price'):'0'!!}" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"  required >
								<label class="control-label" for="">/đêm</label>
							</div>

							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Người lớn: </label>
								<input id="txtAdult" name="txtAdult" type="number" class="form-control input-md" min="1" value= "{!! isset($roomTypeSelect[0])?(int) array_get($roomTypeSelect[0],'adult'):'1'!!}" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required>
								<label class="control-label" for="">/người</label>
							</div>
							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Trẻ em: </label>
								<input id="txtChildren" name="txtChildren" type="number" class="form-control input-md" min="1" value= "{!!isset($roomTypeSelect[0])?(int) array_get($roomTypeSelect[0],'children'):'1'!!}" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required>
								<label class="control-label" for="">/người</label>
							</div>
							<div class="form-inline" style="margin-top:20px;margin-bottom:43px;">
								<label class="label1" for="">Miêu tả:</label>
								<textarea rows="3" cols="30" id="descriptiontxt" class="form-control" name="descriptiontxt" maxlength="100"  > {!! isset($roomTypeSelect[0])? array_get($roomTypeSelect[0],'description'):"" !!} </textarea>
							</div>
					</div>
					<!--right-->
					<div class="col-md-6 form-horizontal" style="margin:10px 0px 10px;border: 2px solid rgb(220,220,220);border-radius:10px;">
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
											<td class="col2"> <input id="txtNameAcc1" name="{!! "txtNameAcc" . $str !!}"   type="text" class="form-control input-md" maxlength="20"  value=" {!!array_get($data,'accessory_name')!!}"  oninvalid="InvalidMsg(this);" required ></td>
											<td class="col3"> <input id="txtQuanlityAcc1" name="{!! "txtquanlityAcc" . $str !!}" type="number" class="form-control input-md" value="{!!(int)array_get($data,'quanlity') !!}" min="1" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"  required ></td>
											<td class="col4"> <input id="txtPriceAcc1" name="{!! "txtPriceAcc" . $str !!}" type="number" class="form-control input-md" value="{!! (int)array_get($data,'price') !!}" min="0" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"  required  ></td>
											<td class="col5"><label class="label2">.000(VND)</label></td>
										</tr>
										<?php $i++?>
									@endforeach
								@endif
								</tbody>
							</table>
							<div class="form-inline col-md-offset-7" style="margin-bottom:20px;">
								<button type="button" class="btn btn-primary col-md-offset-3" value="bntAdd" name="bntAdd" onclick="addAccessory()" ><b>Thêm thiết bị</b></button>
								<button type="button" class="btn btn-danger" value="bntDelete" name="bntDelete" onclick="deleteAccessory()" ><b>Xóa</b></button>
							</div>
					</div>
				</div>
			</div>
			<input type="hidden"  id="count" name = "count" value=""  />
			<input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
			<div class="col-md-12" style="background-color:rgb(236,236,236);border:1px solid rgb(215,215,215);">
					<div class="col-md-6 col-md-offset-9" style="margin-top:10px; margin-bottom:10px;">
						<button type="submit" class="btn btn-success col-md-offset-2" value="bntSave" id="bntSave" name="bntSave" ><b>Lưu</b></button>
						<button type="button" class="btn btn-danger" value="bntCancel" name="bntCancel" onclick="window.location='{{ url("/K002") }}'" ><b>Hủy bỏ</b></button>
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

<script src="{!! asset('Scripts/FrontCheck/CheckError.js') !!}"> </script>
</body>
</html>