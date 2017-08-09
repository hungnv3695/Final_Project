<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Trạng thái phòng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href=" {!! asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') !!} ">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css' ) }}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href=" {!! asset('css/index.css') !!}">

    <!--  jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


    <style type="text/css">
        body
        {
            padding: 0;
            margin: 0;
        }
        .label1
        {
            background-color:rgb(148,170,214);
            color:white;
            width : 80px;
            height:34px;
            line-height:30px;
            text-align:center;
            border:1px solid gray;
            border-radius:5px;
            margin-top:20px;
        }
        .label2
        {
            width:100px;
            text-align:center;
            height:30px;
            line-height:30px;
        }
        .btn-default{
            margin-left:15px;
            font-weight:bold;
        }
        .Roomstatus
        {
            float:left;
            height:30px;
            width:30px;
            border:1px solid gray;
            border-radius:5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top:1%;background-color:#c3bfc0;border-bottom:1px solid #898989;">
			<div class="row">
				<div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
					@if(Session::has('USER_INFO'))
					<b><a class="account" href=" {{url("/K012")}}"><i class="fa fa-user"></i>{!!Session::get('USER_INFO')->user_name !!} </a></b>
					@endif					
					<b>|</b><a class="logout" href="{!! url('/K001/LogOut') !!}"> Đăng xuất</a>
				</div>
				<div class="col-md-12">
					<p class="brand-title">Trạng thái phòng</p>
				</div>
			</div>
        </div>
        <div class="col-md-8 col-md-offset-2" style="background-color:#c3bfc0;border-bottom:1px solid #898989;">
            <div class="col-md-12" style="border:3px solid rgb(200,200,200); margin:15px 0px 15px 0px;border: 1px solid #898989;border-radius:10px;">
				<form method="post" onsubmit="return checkDate();" style="margin-top:10px;">
					<div class="col-md-12 form-inline">
						<label class="control-label" for="date">Nhận phòng:</label>
						<input class="form-control" id="date" name="checkin" placeholder="MM/DD/YYY" type="text"/>
						<label class="control-label" for="date" style="margin-left:15px;">Trả phòng:</label>
						<input class="form-control" id="date" name="checkout" placeholder="MM/DD/YYY" type="text"/>
						<button class="btn btn-default" type = "submit" value="bnt101">Xem</button>
						<input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
					</div>	
				</form>
                <div class="col-md-12 form-inline" style="margin-top:10px;">
                    <label class="label1">Tầng 5:</label>
                    <button class="btn btn-default active" value="bnt501" id="501">501</button>
                    <button class="btn btn-default active" value="bnt502" id="502">502</button>
                    <button class="btn btn-default active" value="bnt503" id="503" >503</button>
                    <button class="btn btn-default active" value="bnt504" id="504" >504</button>
                    <button class="btn btn-default active" value="bnt505" id="505" >505</button>
                    <button class="btn btn-default active" value="bnt506" id="506" >506</button>
                    <button class="btn btn-default active" value="bnt507" id="507" >507</button>
                    <button class="btn btn-default active" value="bnt508" id="508" >508</button>
                    <button class="btn btn-default active" value="bnt509" id="509">509</button>
                </div>
                <div class="col-md-12 form-inline">
                    <label class="label1">Tầng 4:</label>
                    <button class="btn btn-default active" value="bnt401" id="401" >401</button>
                    <button class="btn btn-default active" value="bnt402" id="402" >402</button>
                    <button class="btn btn-default active" value="bnt403" id="403" >403</button>
                    <button class="btn btn-default active" value="bnt404" id="404" >404</button>
                    <button class="btn btn-default active" value="bnt405" id="405" >405</button>
                    <button class="btn btn-default active" value="bnt406" id="406" >406</button>
                    <button class="btn btn-default active" value="bnt407" id="407" >407</button>
                    <button class="btn btn-default active" value="bnt408" id="408" >408</button>
                    <button class="btn btn-default active" value="bnt409" id="409" >409</button>
                </div>
                <div class="col-md-12 form-inline">
                    <label class="label1">Tầng 3:</label>
                    <button class="btn btn-default active" value="bnt301" id="301">301</button>
                    <button class="btn btn-default active" value="bnt302" id="302" >302</button>
                    <button class="btn btn-default active" value="bnt303" id="303" >303</button>
                    <button class="btn btn-default active" value="bnt304" id="304">304</button>
                    <button class="btn btn-default active" value="bnt305" id="305" >305</button>
                    <button class="btn btn-default active" value="bnt306" id="306" >306</button>
                    <button class="btn btn-default active" value="bnt307" id="307" >307</button>
                    <button class="btn btn-default active" value="bnt308" id="308" >308</button>
                    <button class="btn btn-default active" value="bnt309" id="309" >309</button>
                </div>

                <div class="col-md-12 form-inline">
                    <label class="label1">Tầng 2:</label>
                    <button class="btn btn-default active" value="bnt201" id="201" >201</button>
                    <button class="btn btn-default active" value="bnt202" id="202" >202</button>
                    <button class="btn btn-default active" value="bnt203" id="203" >203</button>
                    <button class="btn btn-default active" value="bnt204" id="204" >204</button>
                    <button class="btn btn-default active" value="bnt205" id="205" >205</button>
                    <button class="btn btn-default active" value="bnt206" id="206" >206</button>
                    <button class="btn btn-default active" value="bnt207" id="207" >207</button>
                    <button class="btn btn-default active" value="bnt208" id="208" >208</button>
                    <button class="btn btn-default active" value="bnt209" id="209" >209</button>
                </div>
                <div class="col-md-12 form-inline" style="margin-bottom:20px;">
                    <label class="label1">Tầng 1:</label>
                    <button class="btn btn-default active" value="bnt101" id="101" >101</button>
                    <button class="btn btn-default active" value="bnt102" id="102" >102</button>
                    <button class="btn btn-default active" value="bnt103" id="103" >103</button>
                </div>
                <div class="col-md-12 form-inline" style="margin-bottom:10px;">
                    <div class="col-md-3">
                        <div class="Roomstatus" style="background-color:white;"></div>
                        <label class="label2">Phòng trống</label>
                    </div>
                    <div class="col-md-3">
                        <div class="Roomstatus" style="background-color:rgb(249,244,0);"></div>
                        <label class="label2">Đang sử dụng</label>
                    </div>
                    <div class="col-md-3">
                        <div class="Roomstatus" style="background-color:rgb(223,0,41);"></div>
                        <label class="label2">Dọn phòng</label>
                    </div>
                    <div class="col-md-3">
                        <div class="Roomstatus" style="background-color:rgb(27,79,147);"></div>
                        <label class="label2">Bảo trì</label>
                    </div>
                </div>
            </div>
        </div>
		<div class="col-md-8 col-md-offset-2" style="background-color:#c3bfc0;">
			<div class="row">
				<div class="col-md-2 col-md-offset-10" style="margin-top:10px;margin-bottom:10px;">
					<button id="btnBack" class="btn btn-danger" type="button"><b>Quay lại</b></button>
				</div>
			</div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        var date_input=$('input[id="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
            startDate: '+0d'
        };
        date_input.datepicker(options);
    })
</script>
<script>
    var roomStatus = {!!  isset($roomStatus)?json_encode($roomStatus ):" "  !!};

    for (i = 0; i < roomStatus.length; i++) {
        var id = roomStatus[i].room_number;
        var status =  roomStatus[i].max;
        console.log(id,status);
        var room = document.getElementById(id);
        if(room !=null){
            switch (status){
                case "0":
                    room.setAttribute('style','background-color:WHITE');
                    break;
                case "1":
                    room.setAttribute('style','background-color:rgb(223,0,41)');
                    break;
                case "2":
                    room.setAttribute('style','background-color:rgb(249,244,0)');
                    break;
                case "3":
                    room.setAttribute('style','background-color:rgb(27,79,147)');
                    break;
            }
        }
    }


</script>


<script>
    function checkDate() {
        var checkin = document.getElementsByName('checkin')[0].value;
        var checkout = document.getElementsByName('checkout')[0].value;

        if(new Date(checkin).getDate() > new Date(checkout).getDate() ){
            console.log(checkin,checkout);
            alert("Check-in phải nhỏ hơn hoặc bằng Check-out");
            return false;
        }else{
            return true;
        }
    }
</script>
</body>
</html>