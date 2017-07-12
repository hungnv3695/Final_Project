<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>K005-2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{!! asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset ('css/index.css')  !!}">
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
    <form class="addroom" method="POST"  >


    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="margin-top:2%;background-color:rgb(236,236,236);">
            <p class="brand-title">ADD ROOM</p>
        </div>
        <div class="col-md-10 col-md-offset-1" style="background-color:rgb(215,215,215);">

            <div class="col-md-7 form-horizontal" style="border-right:1px solid rgb(236,236,236);">
                <div class="form-group" style="margin-top:45px;">
                    <label class="col-md-3 col-xs-4 control-label" for="">Mã Phòng</label>
                    <div class="col-md-4 col-xs-5">
                        <input id="roomid" name="roomid" type="text" class="form-control input-md">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-4 control-label" for="">Phòng:</label>
                    <div class="col-md-4 col-xs-5">
                        <input id="roomtxt" name="roomtxt" type="text" class="form-control input-md">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 col-xs-4 control-label" for="">Kiểu phòng:</label>
                    <div class="col-md-3 col-xs-6">
                        <select class="selectpicker form-control" name = ' roomtype' id="roomtype">
                            @foreach($roomtype as $data)
                                <option value="{!! array_get($data,'room_type_id') !!}" {!!( array_get($data,'type_name') == array_get($roomTypeSelect[0],'type_name') )? 'selected':''  !!} > {!! array_get($data,'type_name') !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 col-xs-4 control-label" for="">Tầng:</label>
                    <div class="col-md-4 col-xs-5">
                        <input id="floortxt" name="floortxt" type="text" class="form-control input-md">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 col-xs-4 control-label" for="">Giá:</label>
                    <div class="col-md-5 col-xs-6">
                        <input id="daypricetxt" name="daypricetxt" type="text" class="form-control input-md" value="{!! array_get($roomTypeSelect[0],'price') !!}" readonly>
                    </div>
                    <label class="control-label">/đêm</label>
                </div>
                <div class="form-group">
                    <label class="col-md-3 col-xs-4 control-label" for="">Trạng thái:</label>
                    <div class="col-md-3 col-xs-6">
                        <select class="selectpicker form-control" name = ' status' >
                            @foreach($status as $data)
                                <option value="{!! array_get($data,'status_id') !!}"> {!! array_get($data,'status_name') !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom:45px;">
                    <label class="col-md-3 col-xs-4 control-label" for="">Miêu tả:</label>
                    <div class="col-md-6 col-xs-6">
                        <textarea rows="3" cols="30" id="descriptiontxt" name="descriptiontxt" autofocus maxlength="300" readonly style="background-color: rgb(230,230,230);"> {!! array_get($roomTypeSelect[0],'description') !!}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-4 form-horizontal" style="margin:30px 0px 30px 50px;border: 5px solid rgb(200,200,200);">
                <div class="form-group" style="margin-top:15px;">
                    <label class="col-md-4 col-xs-4 control-label" for="">Bàn</label>
                    <div class="col-md-5 col-xs-5">
                        <input id="table" name="table" type="number"  value="0"  min="0" max="10" class="form-control input-md">
                    </div>
                    <label class="control-label">/chiếc</label>
                </div>
                <div class="form-group">
                    <label class="col-md-4 col-xs-4 control-label" for="">Điều Hòa</label>
                    <div class="col-md-5 col-xs-5">
                        <input id="aircondition" name="aircondition" type="number"  min="0" max="10" value="0"  class="form-control input-md">
                    </div>
                    <label class="control-label">/chiếc</label>
                </div>
                <div class="form-group">
                    <label class="col-md-4 col-xs-4 control-label" for="">Giường</label>
                    <div class="col-md-5 col-xs-5">
                        <input id="bed" name="bed" type="number"  min="0" max="10" value="0"  class="form-control input-md">
                    </div>
                    <label class="control-label">/chiếc</label>
                </div>
                <div class="form-group">
                    <label class="col-md-4 col-xs-4 control-label" for="">Quạt</label>
                    <div class="col-md-5 col-xs-5">
                        <input id="fan" name="fan" type="number"  value="0"  min="0" max="10" class="form-control input-md">
                    </div>
                    <label class="control-label">/chiếc</label>
                </div>
                <div class="form-group">
                    <label class="col-md-4 col-xs-4 control-label" for="">TiVi</label>
                    <div class="col-md-5 col-xs-5">
                        <input id="tivi" name="tivi" type="number"  value="0"  min="0" max="10"  class="form-control input-md">
                    </div>
                    <label class="control-label">/chiếc</label>
                </div>
                <div class="form-group">
                    <label class="col-md-4 col-xs-4 control-label" for="">Tủ Lạnh</label>
                    <div class="col-md-5 col-xs-5">
                        <input id="friger" name="friger" type="number"  value="0" min="0" max="10" class="form-control input-md">
                    </div>
                    <label class="control-label">/chiếc</label>
                </div>

            </div>
        </div>
            <div class="col-md-10 col-md-offset-1" style="background-color:rgb(236,236,236);">
                <div class="col-md-offset-9" style="margin-top:10px; margin-bottom:10px;">
                    <button class="button" value="saveBtn" name="saveBtn" ><b>Save</b></button>
                    <button class="button" value="cancelBtn" name="cancelBtn" ><b>Cancel</b></button>
            </div>
        </div>
    </div>
        <input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
    </form>
</div>
<script>
    var select = document.getElementById('roomtype');
    var roomID = document.getElementById('roomid').value;
    select.onchange = function(){
        Route = "{!!url('/K005_1/K005_3/')!!}" +"?roomTypeID=" + select.value ;
        window.location = Route

        document.getElementById('roomid').value = roomID;
    };
</script>
</body>
</html>