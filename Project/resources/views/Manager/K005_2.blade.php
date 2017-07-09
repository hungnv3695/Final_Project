<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>K005-2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href=" {!! asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') !!}">
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
        <div class="col-md-8 col-xs-10 col-md-offset-2" style="margin-top:2%;background-color:rgb(236,236,236);">
            <p class="brand-title">Room Detail</p>
        </div>
        <div class="col-md-8 col-xs-10 col-md-offset-2" style="background-color:rgb(215,215,215);">
            <form class="form-horizontal col-md-offset-2" style="margin-top:45px;margin-bottom:45px;">
                <div class="form-group">
                    <label class="col-md-2 col-xs-4 control-label" for="">Phòng:</label>
                    <div class="col-md-3 col-xs-5">
                        <input id="roomtxt" name="roomtxt" type="text"  value="{!! $roomDetail[0]->room_number == null?'':$roomDetail[0]->room_number !!}" form-control input-md">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-4 control-label" for="">Kiểu phòng:</label>
                    <div class="col-md-4 col-xs-6">
                        <input id="roomtypetxt" name="roomtypetxt" type="text" value="{!! $roomDetail[0]->type_name == null?'':$roomDetail[0]->type_name !!} "  class="form-control input-md">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-4 control-label" for="">Tầng:</label>
                    <div class="col-md-3 col-xs-5">
                        <input id="floortxt" name="floortxt" type="text" value="{!! $roomDetail[0]->floor == null?'':$roomDetail[0]->floor !!} "  class="form-control input-md">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-4 control-label" for="">Giá:</label>
                    <div class="col-md-4 col-xs-6">
                        <input id="daypricetxt" name="daypricetxt" type="text" value="{!! $roomDetail[0]->price == null?'':$roomDetail[0]->price !!} "  class="form-control input-md">
                    </div>
                    <label class="control-label">/đêm:</label>
                </div>
                <div class="form-group">
                    <div class="col-md-4 col-xs-6 col-md-offset-2 col-xs-offset-4">
                        <input id="hourpricetxt" name="hourpricetxt" type="text" value="{!! $roomDetail[0]->price == null?'':$roomDetail[0]->price !!} "  class="form-control input-md">
                    </div>
                    <label class="control-label">/đêm:</label>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-4 control-label" for="">Trạng thái:</label>
                    <div class="col-md-3 col-xs-5">
                        <input id="roomstatustxt" name="roomstatustxt" type="text" value="{!! $roomDetail[0]->status_name == null?'':$roomDetail[0]->status_name !!} "  class="form-control input-md">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-4 control-label" for="">Miêu tả:</label>
                    <div class="col-md-6 col-xs-6">
                        <textarea rows="3" cols="27" id="descriptiontxt" name="descriptiontxt" autofocus maxlength="300">{!! $roomDetail[0]->description == null?'':$roomDetail[0]->description !!}  </textarea>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 col-xs-10 col-md-offset-2" style="background-color:rgb(236,236,236);">
            <div class="col-md-2 col-md-offset-9" style="margin-top:10px; margin-bottom:10px;">
                <button class="button" value="backBtn" name="backBtn" ><b>Back</b></button>
            </div>
        </div>
    </div>
</div>
</body>
</html>