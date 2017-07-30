<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Account list</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href=" {!! asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" href=" {!! asset('css/index.css') !!}">
    <style>
        body{
            padding:0;
            margin:0;
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


        tbody td, thead th {
            width: 14%;
            float: left;
        }
        .col1
        {
            width: 10%;
            float:left;
        }
        .col2
        {
            width: 25%;
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
            width: 15%;
            float:left;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top:3%;background-color:rgb(236,236,236);border:1px solid rgb(215,215,215);">
            <div class="row">
                <div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
                    <b>|</b><a href="{!! url('/K001/LogOut') !!}"><b> Log-out</b></a>
                </div>
                <div class="col-md-12">
                    <p class="brand-title">Danh sách tài khoản</p>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2" style="background-color:rgb(230,230,230);border:1px solid rgb(215,215,215); border-top:none;border-bottom:none;">
            <form class="form-inline col-md-offset-3" style="margin-top:20px;margin-bottom:20px;" method="post">
                <div class="row">
                    <label class="control-label">Chức vụ:</label>
                    <select id="Position" name="Position" style="width:140px;" class="form-control input-md">
                        <option value="0" {!!  (isset($searchPos) && $searchPos == 0) ? 'selected':''  !!}></option>
                        <option value="G01" {!!  (isset($searchPos) && $searchPos == "G01") ? 'selected':''  !!} >Manager</option>
                        <option value="G02" {!!  (isset($searchPos) && $searchPos == "G02") ? 'selected':''  !!} >Receptionist</option>
                        <option value="G03" {!!  (isset($searchPos) && $searchPos == "G03") ? 'selected':''  !!}>Accountant</option>
                    </select>
                    <input id="searchtxt" name="searchtxt" type="text" class="form-control input-md" size="12" value="{!! isset($searchStr)?$searchStr:"" !!}">
                    <button class="btn btn-default" value="btnSearch" name="btnSearch"><b>Search</b></button>
                    <button class="btn btn-default" value="btbAdd" name="btnAdd" TYPE="button" onclick=" window.location='{!! url('/K011_1/K011_3') !!}' " > <b>Add</b></button>
                    <button class="btn btn-default" value="btnListall" name="btnListall"><b>List all</b></button>
                </div>
                <input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
            </form>
            <hr style="border-top: 1px solid gray;">
            <?php $index =1;?>
            @if(isset($acc))
                <label> {!! 'Kết quả: '. sizeof($acc) . ' bản ghi' !!} </label>
            @endif
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="col1">Stt</th>
                    <th class="col2">Tên đăng nhập</th>
                    <th class="col3">Tên</th>
                    <th class="col4">Vị trí</th>
                    <th class="col5">Trạng thái</th>
                </tr>
                </thead>

                <tbody>
                @if(isset($acc))
                    @foreach($acc as $data)
                        <tr>
                        <td class="col1">{!! $index !!}</td>
                        <td class="col2"> <a href="{!! url('K011_1/K011_2'). '/' . $data->user_id  !!}" >{!! $data->user_id !!} </a> </td>
                        <td class="col3">{{$data->user_name}}</td>
                        <td class="col4">
                            <?php $group = $data->group_cd ;?>
                            @if($group == 'G01') Manager
                            @elseif ($group == 'G02') Receptionist
                            @elseif ($group == 'G03') Accountant
                            @else "";
                            @endif
                        </td>
                        <td class="col5">
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
        <div class="col-md-8 col-md-offset-2" style="background-color:rgb(236,236,236);border:1px solid rgb(215,215,215);">
            <div class="col-md-2 col-md-offset-10" style="margin-top:10px; margin-bottom:10px;">
                <button type="button" class="btn btn-danger col-md-offset-2" value="btnBack" name="btnBack" onclick="window.location='{{ url("/K002") }}'" ><b>Back</b></button>
            </div>
        </div>
    </div>
</div>

</body>
</html>