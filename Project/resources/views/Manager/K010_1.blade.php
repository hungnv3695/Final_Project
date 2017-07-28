<!DOCTYPE html>
<meta name="_token" content="{!! csrf_token() !!}"/>
<head>
	<meta charset="UTF-8">
	<title>Add Room type</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{!! asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') !!} ">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/index.css') !!} ">
	<script type="text/ecmascript" src="{{asset('jqgrid/js/jquery-1.11.0.min.js') }}"></script>

	<style type="text/css">
		body
		{
			padding: 0;
			margin: 0;
		}
		.label1{
			width:100px;
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
			width: 8%;
			float:left;
		}
		.col2
		{
			width: 35%;
			float:left;
		}
		.col3
		{
			width: 18%;
			float:left;
		}
		.col4
		{
			width: 24%;
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
	<form class="addRoomType" method="POST">
		<div class="row">
			<div class="col-md-12" style="margin-top:2%;background-color:rgb(236,236,236);border:1px solid rgb(215,215,215);">
				<div class="row">
					<div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
						@if(Session::has('USER_INFO'))
						<p class="account">{!! "Xin chào " . Session::get('USER_INFO')->user_name !!} </p>
						@endif
						<b>|</b><a href="{!! url('/K001/LogOut') !!}"><b> Log-out</b></a>
					</div>
					<div class="col-md-12">
						<p class="brand-title">Thêm kiểu phòng</p>
					</div>
				</div>
			</div>
			<div class="col-md-12" style="background-color:rgb(230,230,230);border:1px solid rgb(215,215,215); border-top:none;border-bottom:none;">
				<div class="row">
					<!--left-->
					<div class="col-md-5 form-horizontal" style="margin:10px 30px 10px;border: 2px solid rgb(220,220,220);border-radius:10px;">
							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">ID: </label>
								<input id="txtRoomTypeID" name="txtRoomTypeID" type="text" size="10" class="form-control input-md" maxlength="5" oninvalid="InvalidMsg(this);" required>
							</div>
							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Tên loại phòng:</label>
								<input id="txtFullname" name="txtFullname" type="text" size="15" class="form-control input-md" maxlength="30" oninvalid="InvalidMsg(this);" required>
							</div>

							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Giá: </label>
								<input id="txtPrice" name="txtPrice" type="number" class="form-control input-md" min="0" value="0"  oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"  required >
								<label class="control-label" for="">/đêm</label>
							</div>

							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Người lớn: </label>
								<input id="txtAdult" name="txtAdult" type="number" class="form-control input-md" min="1" value="1" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"  required>
								<label class="control-label" for="">/người</label>
							</div>
							<div class="form-inline" style="margin-top:20px;">
								<label class="label1" for="">Trẻ em: </label>
								<input id="txtChildren" name="txtChildren" type="number" min="1" class="form-control input-md" value="1" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"  required>
								<label class="control-label" for="">/người</label>
							</div>
							<div class="form-inline" style="margin-top:20px;margin-bottom:40px;">
								<label class="label1" for="">Miêu tả:</label>
								<textarea rows="3" cols="30" id="descriptiontxt" name="descriptiontxt" class="form-control" maxlength="100"></textarea>
							</div>
					</div>
					<!--right-->
					<div class="col-md-6 form-horizontal" style="margin:10px 0px 10px;border: 2px solid rgb(220,220,220);border-radius:10px;">
							<div class="col-md-12" style="margin-top:30px;margin-bottom:10px;">
								<label>Thiết bị: </label>
							</div>
							<table class="table table-hover" style="margin-bottom:56px;" id="table">
								<thead>
								<tr>
									<th class="col1">STT</th>
									<th class="col2">Tên thiết bị</th>
									<th class="col3">Số lượng</th>
									<th class="col4">Giá</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td class="col1">1</td>
									<td class="col2"> <input id="txtNameAcc1" name="txtNameAcc" type="text" class="form-control input-md" maxlength="20"  oninvalid="InvalidMsg(this);" required ></td>
									<td class="col3"> <input id="txtQuanlityAcc1" name="txtquanlityAcc" type="number" value="1" class="form-control input-md"  min="1" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"  required  ></td>
									<td class="col4"> <input id="txtPriceAcc1" name="txtPriceAcc" type="number" value="0" class="form-control input-md"  min="0" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"  required  ></td>
									<td class="col5"><label class="label2">.000(VND)</label></td>
								</tr>
								</tbody>
							</table>
							<div class="form-inline col-md-offset-8" style="margin-bottom:15px;">
								<button type="button" class="btn btn-primary col-md-offset-3" value="bntAdd" name="bntAdd" onclick="addAccessory()"><b>Add</b></button>
								<button type="button" class="btn btn-danger" value="bntDelete" name="bntDelete" onclick="deleteAccessory()"><b>Delete</b></button>
							</div>
					</div>
				</div>
			</div>
			<div class="col-md-12" style="background-color:rgb(236,236,236);border:1px solid rgb(215,215,215);">
				<div class="col-md-6 col-md-offset-9" style="margin-top:10px; margin-bottom:10px;">
					<button type="submit" class="btn btn-success col-md-offset-2" id="bntSave" value="bntSave" name="bntSave"><b>Save</b></button>
					<button  type="button" class="btn btn-danger" value="bntCancel" name="bntCancel" onclick="window.location='{{ url("/K010_2") }}'" ><b>Cancel</b></button>
				</div>
			</div>
		</div>
		<input type="hidden"  id="count" name = "count" value=""  />
		<input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
	</form>
</div>
<script src="{{asset('Scripts/K010/K010.js')}}"> </script>
<script src="{!! asset('Scripts/FrontCheck/CheckError.js') !!}"> </script>
</body>
</html>