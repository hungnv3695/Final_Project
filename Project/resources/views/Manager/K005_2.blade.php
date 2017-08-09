<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Chi tiết phòng</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{!! asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') !!}">
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
	.label1{
		width:80px;
		text-align:right;
	}
	.table-wrapper 
	{
		position:relative;
	}
	.table-scroll 
	{
		height:142px;
		overflow:auto; 
		margin-top:20px;	  
		margin-bottom:20px;
	}
	.table-wrapper table 
	{
		width:100%;
	}
	.table-wrapper table thead th .text 
	{
		position:absolute;   
		top:-20px;
		z-index:2;
		height:20px;
		width:35%;
		border:1px solid red;
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
	</style>
</head>
<body>
        <div class="container">
            <div class="row">
				<div class="col-md-10 col-md-offset-1" style="margin-top:3%;background-color:#c3bfc0;border-bottom:1px solid #898989;">
					<div class="row">
						<div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
							@if(Session::has('USER_INFO'))
							<b><a class="account" href=" {{url("/K012")}}"><i class="fa fa-user"></i>{!!Session::get('USER_INFO')->user_name !!} </a></b>
							@endif					
							<b>|</b><a class="logout" href="{!! url('/K001/LogOut') !!}"> Đăng xuất</a>
						</div>
						<div class="col-md-12">
							<p class="brand-title">Chi tiết phòng</p>
						</div>
					</div>
				</div>
				<form  class="editroom" method="POST" onsubmit="return confirm('Bạn muốn thực hiện thay đổi này?');" >
					<div class="col-md-10 col-md-offset-1" style="background-color:#c3bfc0;">
						<div class="row">
							<div class="col-md-5 form-horizontal" style="margin:10px 30px 10px;border: 1px solid #898989;border-radius:10px;">
									@if(Session::has('ErrorMSG'))
										<div class="Error" style="margin-top:10px;">
											<label id="ErrorMsg"> {!! Session::get('ErrorMSG')!!} </label>
										</div>
									@endif
									<div class="form-inline" style="margin-top:20px;">
										<label class="label1" for="">Kiểu phòng: </label>  
											<select id="roomtype" name="roomtype" class="form-control input-md" style="width:140px;" autofocus>
												@foreach($roomtype as $data)
													<option value="{!! array_get($data,'room_type_id') !!}"  {!!( array_get($data,'type_name') == array_get($roomTypeSelect[0],'type_name') )? 'selected':''  !!}  > {!! array_get($data,'type_name') !!}</option>
												@endforeach
											</select>
											<input id="txtroomType" name="txtroomType" type="hidden" class="form-control input-md"  value = "">
									</div>
									<div class="form-inline" style="margin-top:20px;">
										<label class="label1" for="">Số phòng: </label>  
										<input id="txtRoomNo" name="txtRoomNo" type="text" class="form-control input-md" size="10" maxlength="5" value="{!! $roomDetail[0]->room_number !!}" onclick="setDisableRoomType()" oninvalid="InvalidMsg(this);" required  >
									</div>
									<div class="form-inline" style="margin-top:20px;">
										<label class="label1" for="">Tầng: </label>  
										<input id="floortxt" name="floortxt" type="number" class="form-control input-md"  size="10" min="1" max="5" value="{!! $roomDetail[0]->floor !!}"  onclick="setDisableRoomType() " oninvalid="InvalidMsg(this);" required  >
									</div>
									<div class="form-inline" style="margin-top:20px;">
										<label class="label1" for="">Trạng thái: </label>  
											<select id="txtStatus" name="txtStatus" class="form-control input-md" style="width:140px;" onclick="setDisableRoomType()" >
													@if( ($roomDetail[0]->status_id == 'RO01') || ($roomDetail[0]->status_id == 'RO03')  )
														<option value="RO01" {!! $roomDetail[0]->status_id == 'RO01' ? 'selected':'' !!} > Phòng Trống </option>
														<option value="RO03" {!! $roomDetail[0]->status_id == 'RO03' ? 'selected':'' !!}>  Bảo Trì </option>
												    @else
													<option value="{!! $roomDetail[0]->status_id !!}" >  {!!$roomDetail[0]->status_name  !!} </option>
													@endif
											</select>
									</div>
									<div class="form-inline" style="margin-top:20px;margin-bottom:20px;">
										<label class="label1" for="">Ghi chú: </label>  
										<textarea rows="3" cols="25" id="txtNote" class="form-control" name="txtNote" maxlength="100" onclick="setDisableRoomType()"  onkeydown="setDisableRoomType()"> {!! $roomDetail[0]->note !!}</textarea>
									</div>								
									<div class="form-inline col-md-offset-5" style="margin-top:75px;margin-bottom:20px;">
										<button class="btn btn-success" value="bntSave" name="bntSave"  onclick="setDisableRoomType();  "><b>Lưu</b></button>
										<button type="button" class="btn btn-primary" value="bntReset" name="bntReset" onclick="location.reload();" ><b>Tạo lại</b></button>
										<button type="button" class="btn btn-danger" value="bntCancel" name="bntCancel" onclick="window.location='{{ url("/K005_1") }}'"><b>Hủy bỏ</b></button>
									</div>
									<input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
							</div>
						<!--right-->
							<div class="col-md-6 form-horizontal" style="margin:10px 0px 10px;border: 1px solid #898989;border-radius:10px;">
									<div class="form-inline" style="margin-top:20px;">
										<label class="label1" for="">Giá: </label>
										<input id="txtPrice" name="txtPrice" type="text" class="form-control input-md" size="15" value = "{!! array_get($roomTypeSelect[0],'price') !!}" readonly>
										<label class="control-label" for="">/đêm</label>
									</div>
									<div class="form-inline" style="margin-top:20px;">
										<label class="label1" for="">Người lớn: </label>
										<input id="txtAdult" name="txtAdult" type="text" class="form-control input-md" size="15" value="{!! array_get($roomTypeSelect[0],'adult') !!}" readonly>
										<label class="control-label" for="">/người</label>
									</div>
									<div class="form-inline" style="margin-top:20px;">
										<label class="label1" for="">Trẻ em: </label>
										<input id="txtAdult" name="txtAdult" type="text" class="form-control input-md" size="15" value="{!! array_get($roomTypeSelect[0],'children') !!}" readonly>
										<label class="control-label" for="">/người</label>
									</div>
									<div class="form-inline" style="margin-top:20px;margin-bottom:20px;">
										<label class="label1" for="">Miêu tả: </label>
										<textarea rows="3" cols="30" id="txtDescription" name="notetxt"  class="form-control" autofocus maxlength="200" style="background-color: rgb(236,236,236);"   readonly>{!! array_get($roomTypeSelect[0],'description') !!} </textarea>
									</div>
									<div class="table-wrapper">
										<div class="table-scroll">
											<table class="table table-bordered">
												<thead>
												<tr>
													<th>STT</th>
													<th>Tên thiết bị</th>
													<th>Số lượng</th>
													<th>Giá </th>
													<th></th>
												</tr>
												</thead>
												@if(isset($accessory))
													<tbody>
													<?php $i = 1?>
													@foreach($accessory as $data)
														<tr>
															<td>{!! $i !!}</td>
															<td>{!! array_get($data,'accessory_name') !!}</td>
															<td>{!! array_get($data,'quantity') !!}</td>
															<td>{!! array_get($data,'price') !!}</td>
															<td><label class="label2">.000(VND)</label></td>
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
		<script src="{!! asset('Scripts/FrontCheck/CheckError.js') !!}"> </script>
		<script>  $("div.Error").delay(2000).slideUp(); </script>
</body>
</html>