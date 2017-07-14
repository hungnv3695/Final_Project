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
		height: 190px;
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
					<p class="brand-title">Xem ki?u ph�ng</p>
				</div>
				<div class="col-md-10 col-md-offset-1" style="background-color:rgb(215,215,215);">
						<div class="col-md-12 form-inline" style="margin-top:20px;margin-bottom:10px;">
							<label class="control-label">Ki?u ph�ng:</label>
							<select id="txtRoomtype" name="txtRoomtype" class="form-control input-md" style="width:140px;">
								<option value="Double">Double</option>
								<option value="Single">Single</option>
							</select>
							<button class="roomlistBnt" value="bntEdit" name="bntEdit"><b>Edit</b></button>
							<hr style="border-top: 1px solid gray;">
						</div>
						
						<!--left-->
						<div class="col-md-6">
							<div class="col-md-12 form-horizontal" style="border:2px solid rgb(200,200,200);margin-bottom:20px;">
								<div class="form-group" style="margin-top:30px;">
									<label class="col-md-4 col-xs-4 control-label" for="">H? t�n: </label>  
									<div class="col-md-6 col-xs-6">
										<input id="txtFullname" name="txtFullname" type="text" class="form-control input-md">
									</div>
								</div>
								<div class="form-group" style="margin-top:10px;">
									<label class="col-md-4 col-xs-4 control-label" for="">Ngu?i l?n: </label>  
									<div class="col-md-4 col-xs-4">
										<input id="txtAdult" name="txtAdult" type="text" class="form-control input-md">
									</div>
									<label class="control-label" for="">/ngu?i</label>  
								</div>
								<div class="form-group" style="margin-top:10px;">
									<label class="col-md-4 col-xs-4 control-label" for="">Tr? em: </label>  
									<div class="col-md-4 col-xs-4">
										<input id="txtChildren" name="txtChildren" type="text" class="form-control input-md">
									</div>
									<label class="control-label" for="">/ngu?i</label>  
								</div>
								<div class="form-group" style="margin-bottom:47px;">
									<label class="col-md-4 col-xs-4 control-label" for="">Mi�u t?:</label>  
									<div class="col-md-6 col-xs-6">
									<textarea rows="3" cols="30" id="descriptiontxt" name="descriptiontxt" autofocus maxlength="300"></textarea>
									</div>
								</div>
							</div>
						</div>
						<!--right-->
						<div class="col-md-5">
							<div class="col-md-12 form-horizontal" style="width:450px;border: 2px solid rgb(200,200,200);margin-bottom:20px;">
								<div class="col-md-12" style="margin-top:10px;margin-bottom:10px;">
									<label>2 b?n ghi</label>
									<button class="roomlistBnt col-md-offset-7" value="bntAdd" name="bntEdit"><b>Add</b></button>
								</div>
								<table class="table table-hover">
									<thead>
									  <tr>
										<th class="col1">Stt</th>
										<th class="col2">RoomNumber</th>
										<th class="col3">RoomType</th>
										<th class="col4">RoomType</th>
									  </tr>
									</thead>
									<tbody>
									  <tr>
										<td class="col1">1</td>
										<td class="col2">101</td>
										<td class="col3">Double</td>
										<td class="col4">Double</td>
									  </tr>
									  <tr>
										<td class="col1">1</td>
										<td class="col2">101</td>
										<td class="col3">Double</td>
										<td class="col4">Double</td>
									  </tr>
									  <tr>
										<td class="col1">1</td>
										<td class="col2">101</td>
										<td class="col3">Double</td>
										<td class="col4">Double</td>
									  </tr>
									  <tr>
										<td class="col1">1</td>
										<td class="col2">101</td>
										<td class="col3">Double</td>
										<td class="col4">Double</td>
									  </tr>
									  <tr>
										<td class="col1">1</td>
										<td class="col2">101</td>
										<td class="col3">Double</td>
										<td class="col4">Double</td>
									  </tr>
									  <tr>
										<td class="col1">1</td>
										<td class="col2">101</td>
										<td class="col3">Double</td>
										<td class="col4">Double</td>
									  </tr>
									</tbody>
								</table>
							</div>
						</div>
				</div>
				<div class="col-md-10 col-md-offset-1" style="background-color:rgb(236,236,236);">
					<div class="col-md-5 col-md-offset-9" style="margin-top:10px; margin-bottom:10px;">
						<button class="roomlistBnt" value="bntSave" name="bntSave"><b>Save</b></button>
						<button class="roomlistBnt" value="bntBack" name="bntBack"><b>Back</b></button>
					</div>
				</div>
            </div>
        </div>
</body>
</html>