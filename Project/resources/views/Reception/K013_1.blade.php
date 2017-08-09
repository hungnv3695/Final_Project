<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Thông tin nhận phòng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{!! asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') !!} ">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css' ) }}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/index.css') !!} ">
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
        hr
        {
            background-color:rgb(215,215,215);
            height:1px;
            border: 0;
        }
        .table-wrapper
        {
            position:relative;
        }
        .table-scroll
        {
            height:240px;
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
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="margin-top:4%;background-color:rgb(245,245,245);border:1px solid rgb(215,215,215);">
            <div class="row">
                <div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
					@if(Session::has('USER_INFO'))
					<b><a class="account" href=" {{url("/K012")}}"><i class="fa fa-user"></i>{!!Session::get('USER_INFO')->user_name !!} </a></b>
					@endif					
					<b>|</b><a class="logout" href="{!! url('/K001/LogOut') !!}"> Đăng xuất</a>
                </div>
                <div class="col-md-12">
                    <p class="brand-title">Thông tin nhận phòng</p>
                </div>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1" style="background-color:rgb(230,230,230);border:1px solid rgb(215,215,215); border-top:none;border-bottom:none;">
            <form method="post">
                <div class="form-inline" style="margin-top:20px;">
                    <label class="label1">Họ tên:</label>
                    <input id="txtFullName" name="txtFullName" type="text" class="form-control input-md" maxlength="50" value="{!! isset($name)?$name:'' !!}" autofocus>
                    <label class="label1">CMND:</label>
                    <input id="txtCMND" name="txtCMND" type="text" class="form-control input-md" value="{!! isset($identity)?$identity:'' !!}" maxlength="12">
                    <button id="btnView" class="btn btn-default" style="margin-left:20px;"><b>Xem</b></button>
                </div>
                <input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
            </form>

            <div class="row"><hr></div>
            <div class="table-wrapper">
                <div class="table-scroll">
                    @if(isset($checkInInfo))
                        <label> {!! 'Kết quả: '. sizeof($checkInInfo) . ' bản ghi' !!} </label>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Người đặt</th>
                            <th>CMND</th>
                            <th>Người ở</th>
                            <th>CMND</th>
                            <th>Ngày nhận</th>
                            <th>Ngày trả</th>
                            <th>Phòng</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;?>
                        @if(isset($checkInInfo))
                            @foreach($checkInInfo as $data)
                            <tr>
                                <td>{!! $i !!}</td>
                                <td>{!! $data->name !!}</td>
                                <td>{!! $data->identity_card !!}</td>
                                <td>{!! $data->customer_name !!}</td>
                                <td>{!! $data->customer_identity_card !!}</td>
                                <td>{!! $data->check_in !!}</td>
                                <td>{!! $data->check_out !!}</td>
                                <td>{!! $data->room_number !!}</td>
                                <td>{!! $data->status !!}</td>
                                @if($data->status == "Phòng Trống")
                                    <td><a href="{!! url('K003_2/') . '?' .'resID='.$data->id . '&' . 'roomID=' . $data->room_id  !!}" style="text-decoration:underline;"><b>Nhận phòng</b></a></td>
                                @else
                                    <td></td>
                                @endif

                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1" style="background-color:rgb(245,245,245);border:1px solid rgb(215,215,215);">
            <div class="row">
                <div class="col-md-3 col-md-offset-10" style="margin-top:10px;margin-bottom:10px;">
                    <button type="button" id="btnBack" class="btn btn-danger col-md-offset-3" type="button"><b>Quay lại</b></button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>