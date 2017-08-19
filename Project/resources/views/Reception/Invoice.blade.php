<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Hóa đơn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        
        hr {
            background-color: #898989;
            height: 1px;
            border: 0;
        }
        
        .text-center h2,
        h3 {
            color: rgb(16, 54, 103);
        }
        
        .article {
            display: flex;
        }
        
        .article {
            flex: 0 2 auto;
            overflow-x: hidden;
        }
        
        .dots::before {
            display: block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: clip;
            content: "......................................................................................................""....................................................................................................." 
        }
        
        .label1 {
            width: 210px;
            font-size: 15px;
            text-align: right;
            color: rgb(16, 54, 103);
        }
        span.fill-line{
			font-size: 16px;
			color: rgb(16, 54, 103);
			letter-spacing:1px;
		}
        span.note {
            font-style: italic;
            font-weight: 100;
        }
        
        .table-wrapper {
            position: relative;
        }
        
        .table-scroll {
            overflow: auto;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        
        .table-wrapper table {
            width: 100%;
        }
        
        .table-wrapper table thead th .text {
            position: absolute;
            top: -20px;
            z-index: 2;
            height: 20px;
            width: 35%;
        }
        
        .table-bordered>thead>tr>th {
            text-align: center;
            font-size: 15px;
            color: rgb(16, 54, 103);
        }
        
        .table-bordered>tbody>tr>td {
            text-align: center;
            font-size: 15px;
            height: 35px;
        }
        
        th.total-line {
            text-align: center;
        }
        
        span.line-right {
            font-size: 15px;
            float: right;
            color: rgb(16, 54, 103);
        }
		span.line-center {
            font-size: 15px;
            color: rgb(16, 54, 103);
        }      
        span.line-left {
            font-size: 15px;
            float: left;
            color: rgb(16, 54, 103);
        }
		p.director-name{
			display:block;
			margin-top:60px;
			font-size:17px;
			font-style:italic;
			letter-spacing:1px;
		}
    </style>
</head>

<body>
    <div class="container" style="margin-top:1%;margin-bottom:1%;">
        <div class="row" style="border:1px solid #898989; margin:30px 20px;">
            <div class="col-xs-12">
                <div class="text-center">
                    <h2>HÓA ĐƠN GIÁ TRỊ GIA TĂNG</h2>
                    <h3 style="line-height:0px;">(VAT INVOICE)</h3>
                </div>
                <div class="row">
                    <hr>
                </div>
                <div class="row">
                    <div class="col-xs-12 article">
                        <label class="label1 control-label">Đơn vị bán hàng<span class="note">(Seller)</span> :</label>&nbsp;&nbsp;<span class="fill-line">Khách sạn Ánh Dương.</span>
                    </div>
                    <div class="col-xs-12 article" style="margin-top:10px;">
                        <label class="label1 control-label">Mã số thuế<span class="note">(Tax code)</span> :</label>&nbsp;&nbsp;<span class="fill-line">0401 9131 89.</span>
                    </div>
                    <div class="col-xs-12 article" style="margin-top:10px;">
                        <label class="label1 control-label">Địa chỉ<span class="note">(Address)</span> :</label>&nbsp;&nbsp;<span class="fill-line">Khách sạn Ánh Dương, Tuần Châu, Hạ Long, Quảng Ninh, Việt Nam.</span>
                    </div>
                    <div class="col-xs-12 article" style="margin-top:10px;">
                        <label class="label1 control-label">Điện thoại<span class="note">(Tell)</span> :</label>&nbsp;&nbsp;<span class="fill-line">+84 164 817 2064.</span>
                    </div>
                    <div class="col-xs-12 article" style="margin-top:10px;">
                        <label class="label1 control-label">Số tài khoản<span class="note">(Account No)</span> :</label>&nbsp;&nbsp;<span class="fill-line">0012 6135 001.</span>
                    </div>
                </div>
                <div class="row">
                    <hr>
                </div>
                <div class="row">
                    <div class="col-xs-12 article">
                        <label class="label1 control-label">Họ tên người mua<span class="note" >(Buyer)</span> :</label><span class="fill-line"> {{ $name}}</span>
                    </div>
                    <div class="col-xs-12 article" style="margin-top:10px;">
                        <label class="label1 control-label">Tên đơn vị<span class="note">(Company name)</span> :</label>&nbsp;
                    </div>
                    <div class="col-xs-12 article" style="margin-top:10px;">
                        <label class="label1 control-label">Mã số thuế<span class="note">(Tax code)</span> :</label>&nbsp;
                    </div>
                    <div class="col-xs-12 article" style="margin-top:10px;">
                        <label class="label1 control-label">Địa chỉ<span class="note">(Address)</span> :</label>&nbsp;
                    </div>
                    <div class="col-xs-12 article" style="margin-top:10px;">
                        <label class="label1 control-label">Hình thức thanh toán<span class="note">(Payment)</span> :</label>&nbsp;
                    </div>
                    <div class="col-xs-12 article" style="margin-top:10px;">
                        <label class="label1 control-label">Số tài khoản<span class="note">(Account No)</span> :</label>&nbsp;
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="table-wrapper">
                    <div class="table-scroll">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Tên hàng hóa, dịch vụ
                                        <br>
                                        <span align="center" class="note">(Description)</span>
                                    </th>
                                    <th>Số lượng
                                        <br>
                                        <span align="center" class="note">(Quantity)</span>
                                    </th>
                                    <th>Đơn giá
                                        <br>
                                        <span align="center" class="note">(Unit price)</span>
                                    </th>
                                    <th>Thành tiền
                                        <br>
                                        <span align="center" class="note">(Amount)</span>
                                    </th>
                                    <th>Ghi chú
                                        <br>
                                        <span align="center" class="note">(Note)</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Nguyễn Việt Hưng</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>100000000</td>
                                    <td>Nothing</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th colspan="5"><span class="line-right">Cộng tiền hàng<span class="note">(Total)<span> :</span>
                                    </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th colspan="5"><span class="line-left">Thuế suất GTGT<span class="note">(VAT rate)</span> : ..........%</span><span class="line-right">Tiền thuế GTGT<span class="note">(VAT amount)</span> :</span>
                                    </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th colspan="6" class="total-line"><span class="line-left">Số tiền viết bằng chữ :<br><span class="note">(Amount in words)</span></span>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="6" class="total-line">
                                        <span class="col-xs-4 line-left" style="margin-bottom:80px;">Người mua hàng<span class="note">(Buyer)</span>
                                        <br>
                                        <span class="note">Ký, ghi rõ họ tên</span>
                                        <br>
                                        <span style="font-weight:100;font-size:12px;"><i>(Sign & full name)</i></span>
                                        </span>
                                        <span class="col-xs-4 line-center" style="margin-bottom:80px;">Người bán hàng<span class="note">(Seller)</span>
                                        <br>
                                        <span class="note">Ký, ghi rõ họ tên</span>
                                        <br>
                                        <span style="font-weight:100;font-size:12px;"><i>(Sign & full name)</i></span>
                                        </span>
                                        <span class="col-xs-4 line-right">Giám đốc<span class="note">(Director)</span>
                                        <br>
                                        <span class="note">Ký, đóng dấu, ghi rõ họ tên</span>
                                        <br>
                                        <span style="font-weight:100;font-size:12px;"><i>(Sign,stamp & full name)</i></span>
										<br>
										<p class="director-name">Nguyễn Hữu Hoàng Tùng</p>
                                        </span>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>