<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Thêm phòng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href=" {!! asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" href=" {!! asset('css/index.css') !!}">
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
            width: 30%;
            float:left;
        }
        .col3
        {
            width: 30%;
            float:left;
        }
        .col4
        {
            width: 30%;
            float:left;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="margin-top:3%;background-color:rgb(236,236,236);border:1px solid rgb(215,215,215);">
			<div class="row">
				<div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
					@if(Session::has('USER_INFO'))
					<p class="account">{!! "Xin chào " . Session::get('USER_INFO')->user_name !!} </p>
					@endif
					<b>|</b><a href="{!! url('/K001/LogOut') !!}"><b> Đăng xuất</b></a>
				</div>
				<div class="col-md-12">
					<p class="brand-title">Thêm phòng</p>
				</div>
			</div>
        </div>
        <div class="col-md-10 col-md-offset-1" style="background-color:rgb(230,230,230);border:1px solid rgb(215,215,215); border-top:none;">
			<div class="row">
				<!--left-->
				<form class="addroom" method="POST" >
					<div class="col-md-5 form-horizontal" style="margin:10px 30px 10px;border: 2px solid rgb(220,220,220);border-radius:10px;">
							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Kiểu phòng: </label>
								<select id="roomtype" name = "roomtype" class="form-control input-md" style="width:140px;" autofocus>
									@foreach($roomtype as $data)
									<option value="{!! array_get($data,'room_type_id') !!}" {!!( array_get($data,'type_name') == array_get($roomTypeSelect[0],'type_name') )? 'selected':''  !!} > {!! array_get($data,'type_name') !!}</option>
									@endforeach
								</select>
								<input id="txtroomType" name="txtroomType" type="hidden" class="form-control input-md"  value = "">
							</div>

							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Mã: </label>
								<input id="txtRoomID" name="txtRoomID" type="text" class="form-control input-md" maxlength="5" onclick="setDisableRoomType()" oninvalid="InvalidMsg(this);" required  >
							</div>
							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Số phòng: </label>
								<input id="txtRoomNo" name="txtRoomNo" type="text" class="form-control input-md" maxlength="5" onclick="setDisableRoomType()" oninvalid="InvalidMsg(this);" required >
							</div>
							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Tầng: </label>
								<input id="floortxt" name="floortxt" type="text" class="form-control input-md" onclick="setDisableRoomType()" oninvalid="InvalidMsg(this);" required  >
							</div>
							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Trạng thái: </label>
								<select id="txtStatus" name="txtStatus" class="form-control input-md" style="width:140px;" onclick="setDisableRoomType()"  >
									@foreach($status as $data)
										<option value="{!! array_get($data,'status_id') !!}"> {!! array_get($data,'status_name') !!}</option>
									@endforeach
								</select>
							</div>

						<div class="Error">
							<label  id="ErrorMsg" for="" style="color:red;" > {!! Session::has('ErrorMSG')?Session::get('ErrorMSG'):"" !!} </label>
						</div>

						<div class="form-inline col-md-offset-7" style="margin-top:115px;margin-bottom:20px;">
							<button class="btn btn-primary" value="bntAdd" name="bntAdd" onclick="setDisableRoomType()"><b>Thêm</b></button>
							<button type="button" class="btn btn-danger" value="bntCancel" name="bntCancel" style="margin-left:5px;" onclick="window.location='{{ url("/K005_1") }}'"><b>Hủy bỏ</b></button>
						</div>
					</div>
					<input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
				</form>

				<!--right-->
				<div class="col-md-6 form-horizontal" style="margin:10px 0px 10px;border: 2px solid rgb(220,220,220);border-radius:10px;">
						<div class="form-inline" style="margin-top:20px;">
							<label class="label1" for="">Giá: </label>
							<input id="txtPrice" name="txtPrice" type="text" class="form-control input-md"  value = "{!! array_get($roomTypeSelect[0],'price') !!}" readonly>
							<label class="control-label" for="">/đêm</label>
						</div>
						<div class="form-inline" style="margin-top:20px;">
							<label class="label1" for="">Người lớn: </label>
							<input id="txtAdult" name="txtAdult" type="text" class="form-control input-md" value="{!! array_get($roomTypeSelect[0],'adult') !!}" readonly>
							<label class="control-label" for="">/người</label>
						</div>
						<div class="form-inline" style="margin-top:20px;">
							<label class="label1" for="">Trẻ em: </label>
							<input id="txtAdult" name="txtAdult" type="text" class="form-control input-md" value="{!! array_get($roomTypeSelect[0],'children') !!}" readonly>
							<label class="control-label" for="">/người</label>
						</div>
						<div class="form-inline" style="margin-top:20px;margin-bottom:20px;">
							<label class="label1" for="">Miêu tả: </label>
							<textarea rows="3" cols="30" id="txtDescription" name="notetxt" class="form-control" autofocus maxlength="200" style="background-color: rgb(236,236,236);"   readonly>{!! array_get($roomTypeSelect[0],'description') !!} </textarea>
						</div>
						<table class="table table-hover">
							<thead>
							<tr>
								<th class="col1">STT</th>
								<th class="col2">Tên thiết bị</th>
								<th class="col3">Số lượng</th>
								<th class="col4">Giá </th>
							</tr>
							</thead>
							@if(isset($accessory))
								<tbody>
								<?php $i = 1?>
								@foreach($accessory as $data)
									<tr>
										<td class="col1">{!! $i !!}</td>
										<td class="col2">{!! array_get($data,'accessory_name') !!}</td>
										<td class="col3">{!! array_get($data,'quantity') !!}</td>
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
    </div>
</div>
<script >
    var select = document.getElementById('roomtype');
    select.onchange = function(){
        Route = "{!!url('/K005_1/K005_3/')!!}" +"?roomTypeID=" + select.value ;
        window.location = Route
    };

    function setDisableRoomType() {
        select.disabled = true;
        document.getElementById('txtroomType').value = select.value;
    }
</script>

<script src="{!! asset('Scripts/FrontCheck/CheckError.js') !!}"> </script>
</body>
</html>