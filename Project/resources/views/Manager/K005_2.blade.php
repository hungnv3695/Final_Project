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
						<div class="col-md-7 form-horizontal" style="border-right:1px solid rgb(236,236,236);">
							<div class="form-group" style="margin-top:45px;">
								<label class="col-md-3 col-xs-4 control-label" for="">Phòng:</label>
								<div class="col-md-4 col-xs-5">
									<input id="roomtxt" name="roomtxt" type="text" class="form-control input-md" value="{!! $roomDetail[0]->room_number !!}" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-xs-4 control-label" for="">Kiểu phòng:</label>
								<div class="col-md-5 col-xs-6">
									<select class="selectpicker" name = ' roomtype'>
										@foreach($roomtype as $data)
											<option value="{!! array_get($data,'room_type_id') !!}"  {!! array_get($data,'type_name') == $roomDetail[0]->type_name ? 'selected':''  !!}> {!! array_get($data,'type_name') !!}</option>
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
								<div class="col-md-5 col-xs-6">
									<input id="daypricetxt" name="daypricetxt" type="text" class="form-control input-md" value="{!! $roomDetail[0]->price !!}" >
								</div>
								<label class="control-label">/đêm</label>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-xs-4 control-label" for="">Trạng thái:</label>
								<div class="col-md-4 col-xs-5">
									<select class="selectpicker" name = ' status' >
										@foreach($status as $data)
											<option value="{!! array_get($data,'status_id') !!}"  {!! array_get($data,'status_name') == $roomDetail[0]->status_name ? 'selected':''  !!}> {!! array_get($data,'status_name') !!}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group" style="margin-bottom:45px;">
								<label class="col-md-3 col-xs-4 control-label" for="">Miêu tả:</label>
								<div class="col-md-6 col-xs-6">
									<textarea rows="3" cols="30" id="descriptiontxt" name="descriptiontxt" autofocus maxlength="300"> {!! $roomDetail[0]->description !!}</textarea>
								</div>
							</div>
						</div>

						<div class="col-md-4 form-horizontal" style="margin:30px 0px 30px 50px;border: 5px solid rgb(200,200,200);">
							<div class="form-group" style="margin-top:15px;">
								<label class="col-md-4 col-xs-4 control-label" for="">{!! array_get($accessory[0],'accessory_name') !!} :</label>
								<div class="col-md-5 col-xs-5">
									<input id="table" name="table" type="number"  min = 0 max = 10 class="form-control input-md" value = '{!! array_get($accessory[0],'quanlity') !!}'>
								</div>
								<label class="control-label">/chiếc</label>
							</div>
							<div class="form-group">
								<label class="col-md-4 col-xs-4 control-label" for="">{!!array_get($accessory[1],'accessory_name') !!} </label>
								<div class="col-md-5 col-xs-5">
									<input id="aircondition" name="aircondition" type="number" min = 0 max = 10 class="form-control input-md"  value = '{!! array_get($accessory[1],'quanlity') !!}'>
								</div>

								<label class="control-label">/chiếc</label>
							</div>
							<div class="form-group">
								<label class="col-md-4 col-xs-4 control-label" for=""> {!! array_get($accessory[2],'accessory_name') !!} </label>
								<div class="col-md-5 col-xs-5">
									<input id="bed" name="bed" type="number" min = 0 max = 10 class="form-control input-md"  value = '{!! array_get($accessory[2],'quanlity') !!}' >
								</div>
								<label class="control-label">/chiếc</label>
							</div>
							<div class="form-group">
								<label class="col-md-4 col-xs-4 control-label" for="">{!! array_get($accessory[3],'accessory_name') !!}:</label>
								<div class="col-md-5 col-xs-5">
									<input id="fan" name="fan" type="number"  min = 0 max = 10 class="form-control input-md" value = '{!! array_get($accessory[3],'quanlity') !!}' >
								</div>
								<label class="control-label">/chiếc</label>
							</div>
							<div class="form-group">
								<label class="col-md-4 col-xs-4 control-label" for="">{!! array_get($accessory[4],'accessory_name') !!}</label>
								<div class="col-md-5 col-xs-5">
									<input id="tivi" name="tivi" type="number" min = 0 max = 10 class="form-control input-md" value = '{!! array_get($accessory[4],'quanlity') !!}' >
								</div>
								<label class="control-label">/chiếc</label>
							</div>
							<div class="form-group">
								<label class="col-md-4 col-xs-4 control-label" for="">{!! array_get($accessory[5],'accessory_name') !!}</label>
								<div class="col-md-5 col-xs-5">
									<input id="friger" name="friger" type="number" min = 0 max = 10 class="form-control input-md" value = '{!! array_get($accessory[5],'quanlity') !!}' >
								</div>
								<label class="control-label">/chiếc</label>
							</div>
						</div>

					</div>
					<div class="col-md-10 col-md-offset-1" style="background-color:rgb(236,236,236);">
						<div class="col-md-offset-7" style="margin-top:10px; margin-bottom:10px;">
							<button class="button" value="saveBtn" name="saveBtn" ><b>Save</b></button>
							<button class="button" value="cancelBtn" name="cancelBtn" ><b>Cancel</b></button>
							<button class="button" value="deleteBtn" name="deleteBtn" ><b>Delete</b></button>
						</div>
					</div>
					<input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
				</form>


            </div>
        </div>
</body>
</html>