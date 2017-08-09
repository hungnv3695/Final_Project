<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Account list</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href=" {!! asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css' ) }}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href=" {!! asset('css/index.css') !!}">
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <style>
    body{
        padding:0;
        margin:0;
    }
	hr
	{
		background-color:#898989;
		height:1px; 
		border: 0;
	}
    .table-wrapper 
	{
		position:relative;
	}
	.table-scroll 
	{
		height:225px;
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
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top:3%;background-color:#c3bfc0;border-bottom:1px solid #898989;">
            <div class="row">
                <div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
					@if(Session::has('USER_INFO'))
					<b><a class="account" href=" {{url("/K012")}}"><i class="fa fa-user"></i>{!!Session::get('USER_INFO')->user_name !!} </a></b>
					@endif					
					<b>|</b><a class="logout" href="{!! url('/K001/LogOut') !!}"> Đăng xuất</a>
				</div>
                <div class="col-md-12">
                    <p class="brand-title">Danh sách tài khoản</p>
                </div>
            </div>
            @if(Session()->has('SuccessMSG'))
                <div class="alert alert-success">
                    {!! Session()->get('SuccessMSG') !!}

                </div>
            @endif
        </div>
        <div class="col-md-8 col-md-offset-2" style="background-color:#c3bfc0;border-bottom:1px solid #898989;">
            <form class="form-inline col-md-offset-3" style="margin-top:20px;" method="post">
                <div class="row">
                    <label class="control-label">Chức vụ:</label>
                    <select id="Position" name="Position" style="width:140px;" class="form-control input-md">
                        <option value="0" {!!  (isset($searchPos) && $searchPos == 0) ? 'selected':''  !!}></option>
                        <option value="G01" {!!  (isset($searchPos) && $searchPos == "G01") ? 'selected':''  !!} >Manager</option>
                        <option value="G02" {!!  (isset($searchPos) && $searchPos == "G02") ? 'selected':''  !!} >Receptionist</option>
                        <option value="G03" {!!  (isset($searchPos) && $searchPos == "G03") ? 'selected':''  !!}>Accountant</option>
                    </select>
                    <input id="searchtxt" name="searchtxt" placeholder="Tìm kiếm..." type="text" class="form-control input-md" size="12" value="{!! isset($searchStr)?$searchStr:"" !!}">
                    <button class="btn btn-default" value="btnSearch" name="btnSearch"><b>Tìm</b></button>
                    <button class="btn btn-default" value="btbAdd" name="btnAdd" TYPE="button" onclick=" window.location='{!! url('/K011_1/K011_3') !!}' " > <b>Thêm</b></button>
                    <button class="btn btn-default" value="btnListall" name="btnListall"><b>Danh sách</b></button>
                </div>
                <input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
            </form>
            <div class="row"><hr></div>
            <?php $index =1;?>
            @if(isset($acc))
                <label> {!! 'Kết quả: '. sizeof($acc) . ' bản ghi' !!} </label>
            @endif
            <div class="table-wrapper">
				<div class="table-scroll">
					<table class="table table-bordered">
						<thead>
						<tr>
							<th>STT</th>
							<th>Tên đăng nhập</th>
							<th>Tên</th>
							<th>Vị trí</th>
							<th>Trạng thái</th>
						</tr>
						</thead>

						<tbody>
						@if(isset($acc))
							@foreach($acc as $data)
								<tr>
								<td>{!! $index !!}</td>
								<td> <a href="{!! url('K011_1/K011_2'). '/' . $data->user_id  !!}" >{!! $data->user_id !!} </a> </td>
								<td>{{$data->user_name}}</td>
								<td>
									<?php $group = $data->group_cd ;?>
									@if($group == 'G01') Manager
									@elseif ($group == 'G02') Receptionist
									@elseif ($group == 'G03') Accountant
									@else "";
									@endif
								</td>
								<td>
									<?php $status = $data->delete_flg;?>
									@if($status=='1') Không hoạt động
									@elseif ($data->acc_lock_flg == '1') Đang bị khóa
									@else Đang hoạt động
									@endif
								</td>
								</tr>
								<?php $index ++;?>
							@endforeach
						@endif
						</tbody>

					</table>
				</div>	
			</div>	
        </div>
        <div class="col-md-8 col-md-offset-2" style="background-color:#c3bfc0;">
            <div class="col-md-2 col-md-offset-10" style="margin-top:10px; margin-bottom:10px;">
                <button type="button" class="btn btn-danger col-md-offset-1" value="btnBack" name="btnBack" onclick="window.location='{{ url("/K002") }}'" ><b>Quay lại</b></button>
            </div>
        </div>
    </div>
</div>
<script>  $("div.alert").delay(2000).slideUp(); </script>
</body>
</html>