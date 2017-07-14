<!DOCTYPE html>
<meta name="_token" content="{!! csrf_token() !!}"/>
<head>
	<meta charset="UTF-8">
	<title>Add Room type</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/ecmascript" src="{{asset('jqgrid/js/jquery-1.11.0.min.js') }}"></script>

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
	<form class="addRoomType" method="POST">

		<div class="row">
			<div class="col-md-10 col-md-offset-1" style="margin-top:3%;background-color:rgb(236,236,236);">
				<p class="brand-title">Thêm kiểu phòng</p>
			</div>
			<div class="col-md-10 col-md-offset-1" style="background-color:rgb(215,215,215);">
				<!--left-->
				<div class="col-md-6" style="border-right:1px solid rgb(236,236,236);">
					<div class="col-md-12 form-horizontal" style="border:2px solid rgb(200,200,200);margin-top:20px;margin-bottom:50px;">
						<div class="form-group" style="margin-top:30px;">
							<label class="col-md-4 col-xs-4 control-label" for="">ID: </label>
							<div class="col-md-4 col-xs-4">
								<input id="txtRoomTypeID" name="txtRoomTypeID" type="text" class="form-control input-md" required>
							</div>
						</div>
						<div class="form-group" style="margin-top:10px;">
							<label class="col-md-4 col-xs-4 control-label" for="">Tên Loại Phòng:</label>
							<div class="col-md-6 col-xs-6">
								<input id="txtFullname" name="txtFullname" type="text" class="form-control input-md" required>
							</div>
						</div>

						<div class="form-group" style="margin-top:10px;">
							<label class="col-md-4 col-xs-4 control-label" for="">Giá: </label>
							<div class="col-md-4 col-xs-4">
								<input id="txtPrice" name="txtPrice" type="number" class="form-control input-md" required >
							</div>
							<label class="control-label" for="">/đêm</label>
						</div>

						<div class="form-group" style="margin-top:10px;">
							<label class="col-md-4 col-xs-4 control-label" for="">Người lớn: </label>
							<div class="col-md-4 col-xs-4">
								<input id="txtAdult" name="txtAdult" type="number" class="form-control input-md" required>
							</div>
							<label class="control-label" for="">/người</label>
						</div>
						<div class="form-group" style="margin-top:10px;">
							<label class="col-md-4 col-xs-4 control-label" for="">Trẻ em: </label>
							<div class="col-md-4 col-xs-4">
								<input id="txtChildren" name="txtChildren" type="number" class="form-control input-md" required>
							</div>
							<label class="control-label" for="">/người</label>
						</div>
						<div class="form-group" style="margin-bottom:50px;">
							<label class="col-md-4 col-xs-4 control-label" for="">Miêu tả:</label>
							<div class="col-md-6 col-xs-6">
								<textarea rows="3" cols="30" id="descriptiontxt" name="descriptiontxt" autofocus maxlength="300" required></textarea>
							</div>
						</div>
					</div>
				</div>
				<!--right-->
				<div class="col-md-5">
					<div class="col-md-12 form-horizontal" style="width:450px;border: 2px solid rgb(200,200,200);margin-top:20px;margin-bottom:50px;">
						<div class="col-md-12" style="margin-top:30px;margin-bottom:10px;">
							<label>Trang Thiết Bị: </label>
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
							<tr>
								<td class="col1">1</td>
								<td class="col2"> <input id="txtNameAcc1" name="txtNameAcc" type="text" class="form-control input-md"></td>
								<td class="col3"> <input id="txtQuanlityAcc1" name="txtquanlityAcc" type="number" class="form-control input-md"></td>
								<td class="col4"> <input id="txtPriceAcc1" name="txtPriceAcc" type="number" class="form-control input-md"></td>
							</tr>
							</tbody>
						</table>
						<button type="button" class="roomlistBnt col-md-offset-10" value="bntAdd" name="bntAdd" onclick="addAccessory()"><b>Add</b></button>
						<button type="button" class="roomlistBnt col-md-offset-10" value="bntDelete" name="bntDelete" onclick="deleteAccessory()"><b>Delete</b></button>
					</div>
				</div>
			</div>
			<div class="col-md-10 col-md-offset-1" style="background-color:rgb(236,236,236);">
				<div class="col-md-5 col-md-offset-9" style="margin-top:10px; margin-bottom:10px;">
					<button type="submit" class="roomlistBnt" id="bntAddType" value="bntAddType" name="bntAddType"><b>Add-Type</b></button>
					<button  type="buttoô" class="roomlistBnt" value="bntBack" name="bntBack"><b>Back</b></button>
				</div>
			</div>
		</div>
		<input type="hidden"  id="count" name = "count" value=""  />
		<input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
	</form>
</div>
<script src="{{asset('Scripts/K010/K010.js')}}"> </script>
</body>
</html>