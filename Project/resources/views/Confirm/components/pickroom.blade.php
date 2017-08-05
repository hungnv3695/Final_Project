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
</style>
<div class="pickroom">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="checkin">Check in date</label>
                    <input type="text" class="form-control" id="checkin" placeholder="Check in date">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="checkout">Check out date</label>
                    <input type="text" class="form-control" id="checkout" placeholder="Check out date">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="adult">Adult</label>
                    <input type="number" class="form-control" id="adult" min="1">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="child">Children</label>
                    <input type="number" class="form-control" id="child" min="0">
                </div>
            </div>
            <div class="col-md-2 justify-content-center" style="margin-top:26px;">
                <button class="btn btn-primary">Apply</button>
            </div>
        </div>
		<div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="label1" for="roomtype"><b>Kiểu phòng</b></label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
					<label class="label1" for="roomleft"><b>Phòng trống</b></label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label class="label1" for="price"><b>Giá</b></label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label class="label1" for="quantity"><b>Số lượng</b></label>
                </div>
            </div>
			<div class="col-md-2">
                <div class="form-group">
                    <label class="label1" for="quantity"><b>Tổng tiền</b></label>
                </div>
            </div>
        </div>
		<div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <span class="fa fa-home" style="margin-right:5px;"></span><label class="label2"><b>Single</b></label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
					 <label class="label2"><b>15</b></label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label class="label2"><b>$190</b></label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="number" class="form-control" id="quantity" min="1">
                </div>
            </div>
			<div class="col-md-2">
                <div class="form-group">
                    <label class="label2"><b>$390</b></label>
                </div>
            </div>
        </div>
    </div>
</div>