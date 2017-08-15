<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Xem kiểu phòng</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href=" {!! asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') !!} ">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css' ) }}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href=" {!! asset('css/index.css') !!}">
	<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>


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
			line-height:29px;
		}
		.lable3{
			display: inline-block;
			text-align: center;
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
			height: 260px;
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
			width: 35%;
			float:left;
		}
		.col3
		{
			width: 15%;
			float:left;
		}
		.col4
		{
			width: 29%;
			float:left;
		}
		.col5
		{
			width: 11%;
			float:left;
		}
		.table-bordered>thead>tr>th{
			text-align:center;
		}
		.table>tbody>tr>td{
			text-align:center;
		}
		.Error
		{
			color: #D8000C;
			background-color: #FFBABA;
			height:40px;
			line-height:40px;
			opacity: 0.6;
			border-radius:5px;
			text-align:center;
		}
		.charMoney{
			font-weight:100;
		}
	</style>
</head>
<body>
<div class="container">
	<form class="editRoomType" method="post" id="editRoomType" onsubmit="return checkvalue();" >
		<div class="row">
			<div class="col-md-12" style="margin-top:2%;background-color:#c3bfc0;border-bottom:1px solid #898989;">
				<div class="row">
					<div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
						@if(Session::has('USER_INFO'))
						<b><a class="account" href=" {{url("/MyInfo")}}"><i class="fa fa-user"></i>{!!Session::get('USER_INFO')->user_name !!} </a></b>
						@endif					
						<b>|</b><a class="logout" href="{!! url('LogOut') !!}"> Đăng xuất</a>
					</div>
					<div class="col-md-12">
						<p class="brand-title">Xem kiểu phòng</p>
					</div>
				</div>
				@if(Session()->has('SuccessMSG'))
					<div class="alert alert-success">
						{!! Session()->get('SuccessMSG') !!}

					</div>
				@endif
			</div>
			<div class="col-md-12" style="background-color:#c3bfc0;border-bottom:1px solid #898989;">
				<div class="row">
					<div class="col-md-12 form-inline" style="margin-top:20px;margin-bottom:10px;">
						<label class="control-label">Chọn kiểu phòng:</label>
						<select id="txtRoomtype" name="txtRoomtype" class="form-control input-md" style="width:140px;" autofocus>
							<option value="0">{!! " " !!}</option>
							@foreach($roomtype as $data)
								<option value="{!! array_get($data,'room_type_id') !!}" {!!(isset($roomTypeSelect[0]) && array_get($data,'type_name') == array_get($roomTypeSelect[0],'type_name') )? 'selected':''  !!} > {!! array_get($data,'type_name') !!}</option>
							@endforeach
						</select>
						<input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
						<button type="button" class="btn btn-default" value="bntEdit" id = "bntEdit" name="bntEdit"><b>Xem</b></button>
						<button type="button" class="btn btn-default" value="btnAddNew" id = "btnAdd" name="btnAdd" onclick="window.location='{{ url("/RoomTypeList/AddRoomType") }}'" ><b>Thêm mới</b></button>
					</div>					
					<!--left-->
					<div class="col-md-5 form-horizontal" style="margin:10px 30px 10px;border: 1px solid #898989;border-radius:10px;" id="leftDiv">
							@if(Session::has('ErrorMSG'))
								<div class="Error" style="margin-top:10px;">
									<label id="ErrorMsg"> {!! Session::get('ErrorMSG')!!} </label>
								</div>
							@endif
							<div class="form-inline" style="margin-top:10px;">
								<label class="label1" for="">Mã: </label>
								<input id="txtRoomTypeID" name="txtRoomTypeID" type="text" class="form-control input-md" size="10" maxlength="5" value= " {!! isset($roomTypeSelect[0])? array_get($roomTypeSelect[0],'room_type_id'):"" !!} " readonly >
							</div>
							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Loại phòng:</label>
								<input id="txtFullname" name="txtFullname" type="text" class="form-control input-md" size="15" maxlength="30" value= " {!! isset($roomTypeSelect[0])? array_get($roomTypeSelect[0],'type_name'):"" !!} " oninvalid="InvalidMsg(this);" required>
							</div>

							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Giá: </label>
								<input id="txtPrice" name="txtPrice" type="text" class="form-control input-md" default="0" min="0" oninput="formatCurency(this,1); "  oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"  required >
								<label class="control-label" for="">(VND)</label>
							</div>
							<div class="form-inline" style="margin-top:10px;">
								<label class="charMoney control-label" for="" id="charMoney"></label>
							</div>
							<div class="form-inline" style="margin-top:10px;">
									<label class="label1" for="">Người lớn: </label>
									<input id="txtAdult" name="txtAdult" type="number" class="form-control input-md" min="1" value= "{!! isset($roomTypeSelect[0])?(int) array_get($roomTypeSelect[0],'adult'):'1'!!}" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required>
									<label class="control-label" for="">/người</label>
							</div>
							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Trẻ em: </label>
								<input id="txtChildren" name="txtChildren" type="number" class="form-control input-md" min="1" value= "{!!isset($roomTypeSelect[0])?(int) array_get($roomTypeSelect[0],'children'):'1'!!}" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required>
								<label class="control-label" for="">/người</label>
							</div>
							<div class="form-inline" style="margin-top:20px;margin-bottom:53px;">
								<label class="label1" for="">Miêu tả:</label>
								<textarea rows="3" cols="30" id="descriptiontxt" class="form-control" name="descriptiontxt" maxlength="100"  > {!! isset($roomTypeSelect[0])? array_get($roomTypeSelect[0],'description'):"" !!} </textarea>
							</div>
					</div>
					<!--right-->
					<div class="col-md-6 form-horizontal" style="margin:10px 0px 10px;border: 1px solid #898989;border-radius:10px;">
							<div class="col-md-12" style="margin-top:20px;margin-bottom:10px;">
								<label>Thiết Bị: </label>
							</div>
							<table class="table table-bordered" style="margin-bottom:15px;" id="table">
								<thead>
								<tr>
									<th class="col1"></th>
									<th class="col2">Tên Thiết bị</th>
									<th class="col3">Số Lượng</th>
									<th class="col4">Giá</th>
									<th class="col5"></th>
								</tr>
								</thead>
								<tbody>
								@if(isset($accessory))
									<?php $i = 1?>
									@foreach($accessory as $data)
										<tr>
											<?php ($i==1)?$str="":$str=$i-1; ?>

											<td class="col1" style="line-height:34px;">{!! $i !!}</td>
											<td class="col2"> <input id="txtNameAcc1" name="{!! "txtNameAcc" . $str !!}"   type="text" class="form-control input-md" maxlength="20"  value=" {!!array_get($data,'accessory_name')!!}"  oninvalid="InvalidMsg(this);" required ></td>
											<td class="col3"> <input id="txtQuanlityAcc1" name="{!! "txtquantityAcc" . $str !!}" type="number" class="form-control input-md" value="{!!(int)array_get($data,'quantity') !!}" min="1" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"  required ></td>
											<td class="col4"> <input id="{!! "txtPriceAcc".$i!!}" name="{!! "txtPriceAcc" . $str !!}" type="text" class="form-control input-md" value=" {!!  (int)array_get($data,'price') !!}" min="0" oninput="formatCurency(this,0); " oninvalid="InvalidMsg(this);"  required  ></td>
											<td class="col5"><label class="label2">(VND)</label></td>
										</tr>
										<?php $i++?>
									@endforeach
								@endif
								</tbody>
							</table>
							<div class="form-inline col-md-offset-7" style="margin-bottom:10px;">
								<button type="button" class="btn btn-primary col-md-offset-3" value="bntAdd" name="bntAdd" onclick="addAccessory()" ><b>Thêm thiết bị</b></button>
								<button type="button" class="btn btn-danger" value="bntDelete" name="bntDelete" onclick="deleteAccessory()" ><b>Xóa</b></button>
							</div>
					</div>
				</div>
			</div>
			<input type="hidden"  id="count" name = "count" value=""  />
			<input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
			<div class="col-md-12" style="background-color:#c3bfc0;margin-bottom:10px;">
				<div class="row">
					<!--left-->
					<div class="col-md-3 col-md-offset-9" style="margin-top:10px; margin-bottom:10px;">
						<button class="btn btn-success col-md-offset-4" value="bntSave" id="bntAddType" name="bntSave" ><b>Lưu</b></button>
						<button type="button" class="btn btn-danger" value="bntCancel" name="bntCancel" onclick="window.location='{{ url("/SeparateGroup") }}'" ><b>Hủy bỏ</b></button>
					</div>
				</div>
			</div>
		</div>
	</form>

</div>

<script>
	var btn = document.getElementById('bntEdit');
	var select = document.getElementById('txtRoomtype');
	btn.onclick = function () {
		Route = "{!!url('/RoomtypeList')!!}" +"?roomTypeID=" + select.value ;
        window.location = Route

		return true;
    }

    function checkvalue() {
        var selectValue = document.getElementById('txtRoomTypeID').value;

        if(selectValue.trim() ==""){
            alert("Vui lòng chọn loại phòng và edit");
            return false;
        }else{
            return confirm('Bạn muốn thực hiện thay đổi này?');
		}
    }

    window.onload = function(){
        loadPrice(document.getElementById('txtPrice'),{!!isset($roomTypeSelect[0])?(int)array_get($roomTypeSelect[0],'price'):'0'!!},1);
    }

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
            var name = 'txtPriceAcc' + i;
            var txt = document.getElementById(name);
            txt.value = addCommas(txt.value);
        }
    }

    formatMoney();

</script>

<script src="{{asset('Scripts/K010/K010.js')}}"> </script>
<script src="{!! asset('Scripts/ReadNumber/readNumber.js') !!}"> </script>
<script src="{!! asset('Scripts/FrontCheck/CheckError.js') !!}"> </script>
<script>  $("div.alert").delay(2000).slideUp(); </script>
<script>  $("div.Error").delay(2000).slideUp(); </script>
</body>
</html>