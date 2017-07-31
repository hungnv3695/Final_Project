<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Thay đổi mật khẩu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{!! asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') !!} ">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/index.css') !!} ">
    <style type="text/css">
        body
        {
            padding: 0;
            margin: 0;
        }
        .label1
        {
            width : 150px;
            text-align:right;
        }
    </style>
</head>
<body>
<div class="container">
    <form method="post" onsubmit="return checkvalue();" >
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin-top:5%;background-color:rgb(236,236,236);border:1px solid rgb(215,215,215);">
                <div class="row">
                    <div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
						@if(Session::has('USER_INFO'))
							<p class="account">{!! "Xin chào " . Session::get('USER_INFO')->user_name !!} </p>
						@endif
                        <b>|</b><a href="{!! url('/K001/LogOut') !!}"><b> Đăng xuất</b></a>
                    </div>
                    <div class="col-md-12">
                        <p class="brand-title">Thay đổi mật khẩu</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3" style="background-color:rgb(230,230,230);border:1px solid rgb(215,215,215); border-top:none;border-bottom:none;">
                <div class="col-md-12" style="margin-top:20px;margin-bottom:20px;border: 2px solid rgb(220,220,220);border-radius:10px;">
                    <div class="form-inline col-md-offset-1" style="margin-top:20px;">
                        <label class="label1" for="">Tên tài khoản: </label>
                        <input id="txtAccountName" name="txtAccountName" type="text" class="form-control input-md" maxlength="50" size="20" value="{!! $user !!}" readonly>
                    </div>
                    <div class="form-inline col-md-offset-1" style="margin-top:20px;">
                        <label class="label1" for="">Mật khẩu cũ: </label>
                        <input  id="txtOldPwd" name="txtOldPwd" type="password" class="form-control input-md" maxlength="50" size="20" autofocus oninvalid="InvalidMsg(this);" required  >
                    </div>
                    <div class="form-inline col-md-offset-1" style="margin-top:20px;">
                        <label class="label1" for="">Mật khẩu mới: </label>
                        <input id="txtNewPwd" name="txtNewPwd" type="password" class="form-control input-md" maxlength="50" size="20" oninvalid="InvalidMsg(this);" required  >
                    </div>
                    <div class="form-inline col-md-offset-1" style="margin-top:20px;margin-bottom:20px;">
                        <label class="label1" for="">Xác nhận mật khẩu: </label>
                        <input id="txtConfirmNewPwd" name="txtConfirmNewPwd" type="password" class="form-control input-md" maxlength="50" size="20" oninvalid="InvalidMsg(this);" required  >
                    </div>
                </div>
                <div class="Error">
                    <label  id="ErrorMsg" for="" style="color:red;" > {!! Session::has('ChangePassMSG')?Session::get('ChangePassMSG'):"" !!} </label>
                </div>

            </div>
            <div class="col-md-6 col-md-offset-3" style="background-color:rgb(236,236,236);border:1px solid rgb(215,215,215);">
                <div class="form-inline col-md-offset-8" style="margin-top:10px;margin-bottom:10px;">
                    <button class="btn btn-success col-md-offset-1" value="bntChange" name="bntChange"><b>Thay đổi</b></button>
                    <button type="button" class="btn btn-danger" value="bntBack" name="bntBack" style="margin-left:3px;" onclick="window.location='{{ url("/K012") }}'"  ><b>Quay lại</b></button>
                </div>
            </div>
        </div>
        <input type="hidden" name = "_token" value="{!! csrf_token() !!}"    />
    </form>

</div>
</body>

<script>
    function checkvalue() {
        var newPass = document.getElementById('txtNewPwd').value;
        var confirmPass = document.getElementById('txtConfirmNewPwd').value;

        if(newPass != confirmPass){
            document.getElementById("ErrorMsg").innerHTML = "Mật khẩu mới và xác nhận mật khẩu không trùng khớp";
            return false;
        }else{
            return true;
        }
    }
</script>

<script src="{!! asset('Scripts/FrontCheck/CheckError.js') !!}"> </script>
</html>