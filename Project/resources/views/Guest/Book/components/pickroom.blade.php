<style type="text/css">
    .label1{
        width:120px;
        text-align:left;
		font-size:120%;
		text-decoration:underline;
    }
	.label2{
        line-height:40px;
    }
	.btnApply, .btnNext
	{
		width:90px;
		background: rgb(140, 110, 78);
		color: #ffffff;
		height:32px;
		border-radius: 4px;
		border:none;
	}
	.btnApply:hover, .btnNext:hover {
        background: rgb(34, 34, 34);
    }
</style>

<div class="pickroom" style="margin-bottom:40px;">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="checkin">Ngày check-in</label>
                    <input type="text" class="form-control" id="checkin" placeholder="Check in date">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="checkout">Ngày check-out</label>
                    <input type="text" class="form-control" id="checkout" placeholder="Check out date">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="adult">Người lớn</label>
                    <input type="number" class="form-control" id="adult" min="1" value="1">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="child">Trẻ em</label>
                    <input type="number" class="form-control" id="child" min="0" value="0">
                </div>
            </div>
            <div class="col-md-2 justify-content-center" style="margin-top:26px;" id="btnApply">
                <button class="btnApply">Tìm phòng</button>
            </div>
        </div>
        <div class="row" id="Infor">
            <div class="col-md-12" id="titleBook">
            </div>
            <div class="col-md-12" id="inforBook">
            </div>
        </div>
		<div class="row">
			<div class="col-md-2 col-md-offset-10 justify-content-center" style="margin-top:20px;margin-bottom:20px;" id="nextdiv" >
				<button class="btnNext" id="btnNext">Tiếp theo</button>
			</div>
        </div>

    </div>
</div>