/**
 * Created by Nguyen Viet Hung on 8/5/2017.
 */
$(document).ready(function () {
    var count= 0;
    var maxPick = 4;

    //Start :Datetimepicker
        jQuery('#checkin').datetimepicker({
            format:'Y/m/d',
            onShow:function( ct ){
                this.setOptions({
                    maxDate:jQuery('#checkout').val()?jQuery('#checkout').val():'-1969/10/31',
                    minDate:'-1969/12/25',
                })
            },
            timepicker:false
        });
    jQuery('#checkout').datetimepicker({
        format:'Y/m/d',
        onShow:function( ct ){
            this.setOptions({
                minDate:jQuery('#checkin').val()?jQuery('#checkin').val():false

            })
        },
        timepicker:false
    });
   // $.datetimepicker.setLocale('vi');
    //End Datetimepicker
    function addslick() {
        $('.multiple-items').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3
        });
    }

    function addCommas(nStr)
    {
        nStr += '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(nStr)) {
            nStr = nStr.replace(rgx, '$1' + '.' + '$2');
        }
        return nStr;
    }

    function removeCommas(nStr)
    {
        nStr.replace(".","");
        return nStr;
    }
    function addTitle() {
        $("#titleBook").append(
        '<div class="col-md-3">'+
            '<div class="form-group">'+
            '<label class="label1" for="roomtype"><b>Kiểu phòng</b></label>'+
            '</div>'+
        '</div>'+
        '<div class="col-md-3">'+
            '<div class="form-group">'+
            '<label class="label1" for="roomleft"><b>Phòng trống</b></label>'+
            '</div>'+
        '</div>'+
        '<div class="col-md-2">'+
            '<div class="form-group">'+
            '<label class="label1" for="price"><b>Giá</b></label>'+
            '</div>'+
        '</div>'+
        '<div class="col-md-2">'+
            '<div class="form-group">'+
            '<label class="label1" ><b>Số lượng</b></label>'+
            '</div>'+
        '</div>'+
        '<div class="col-md-2">'+
            '<div class="form-group">'+
            '<label class="label1" ><b>Tổng tiền</b></label>'+
            '</div>'+
        '</div>'
        );
    }
    
    function addInforBook(result, count) {
        var total = 0 ;
        for (var i = 0; i < count; i++){
            $("#inforBook").append(
                '<div class="col-md-3">'
                    +'<div class="form-group">'
                    +'<span class="fa fa-home" style="margin-right:5px;"></span><label class="label2"><b>'+result[i].type_name +'</b></label>'
                    +'</div>'
                +'</div>'
                +'<div class="col-md-3">'
                    +'<div class="form-group">'
                    +'<label class="label2" id="roomfree'+ i +'">'+ result[i].Count  +'</label>'
                    +'</div>'
                +'</div>'
                +'<div class="col-md-2">'
                    +'<div class="form-group">'
                    +'<label class="label2" id="price' + i +'" >'+ addCommas(result[i].price) +'</label>'
                    +'</div>'
                +'</div>'
                +'<div class="col-md-2">'
                    +'<div class="form-group">'
                    +'<input type="number" class="form-control" id="quantity' + i + '" name="quantity" min="0" max="4" value="0">'
                    +'</div>'
                +'</div>'
                +'<div class="col-md-2">'
                    +'<div class="form-group">'
                    +'<label class="label2" id="totalprice' + i +'"><b>'+ total +'</b></label>'
                    +'<b>  VNĐ / 1 đêm</b>'
                    +'</div>'
                +'</div>')
            // if(i == (count -1)){
            //     $("#inforBook").append(
            //         '<div class="col-md-2 col-md-offset-10 justify-content-center">'
            //         +'<button class="btn btn-primary" style="width: 80px ;margin-botton:30px" id="btnNext" name="btnNext" > Next </button>'
            //
            //         +'</div>'
            //
            //     );
            // }
        }


    }


    function  addRoomInfor(type_name,adult,children,description,img_url) {
        $(".multiple-items").append(
            '<div class="card" style="height: 320px;>'
            +   '<div class="card-block" ">'
            +       '<h4 class="card-title" id="infor0" ><h2 style="margin-left: 20px; margin-top: -5px">'+type_name+'</h2></h4>'
            +        '<div class="row">'
            +            '<div class="col-md-6">'
            +                '<img style="margin-left: 10px;" src="'+img_url+'" class="rounded img-fluid">'
            +            '</div>'
            +            '<div class="col-md-6">'
            +                '<div id="infor1"><h4><b>' + description +'</b></h4></div>'
            +                '<div id="infor2"><h4><b>Max adult: '+adult+'</b></h4></div>'
            +                '<div id="infor3"><h4><b>Max children: '+ children +'</b></h4></div>'
            +            '</div>'
            +        '</div>'
            +    '</div>'
            +'</div>'
        );
    }
    loadRoomInfor();
    function loadRoomInfor() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'LoadRoomInfor',
            method: 'GET',
            cache: false,
            dataType: 'json',
            contentType: 'application/x-www-form-urlencoded',
            success: function (result) {
                var type_name = "";
                var adult = "";
                var children = "";
                var description = "";
                var img_url = ""
                console.log(result);
                for(var i =0; i<result.length; i++){
                    type_name = result[i].type_name;
                    adult = result[i].adult;
                    children = result[i].children;
                    description = result[i].description;
                    img_url = result[i].image_url;
                    addRoomInfor(type_name,adult,children,description,img_url);
                }
                addslick();

            },
            error: function(){
                alert('error');
            }
        });
    }

    function loadBookInfor(){
        var check_in = $("#checkin").val();
        var check_out = $("#checkout").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'LoadRoomType',
            method: 'GET',
            cache: false,
            dataType: 'json',
            data: {
                check_in: check_in,
                check_out: check_out
            },
            contentType: 'application/x-www-form-urlencoded',
            success: function (result) {
                jQuery('#Infor div').html('');
                count = result.length;
                addTitle();
                addInforBook(result, count);


            },
            error: function(){
                alert('error');
            }
        });

        setInterval(function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'LoadRoomType',
                method: 'GET',
                cache: false,
                dataType: 'json',
                data: {
                    check_in: check_in,
                    check_out: check_out
                },
                contentType: 'application/x-www-form-urlencoded',
                success: function (result) {
                    jQuery('#Infor div').html('');
                    count = result.length;
                    addTitle();
                    addInforBook(result, count);


                },
                error: function(){
                    alert('error');
                }
            });
        },60000)

    }

    $("#btnApply").click(function (e) {

        if($("#checkin").val()==""){
            $("#checkin").focus();
            return;
        }
        if($("#checkout").val()==""){
            $("#checkout").focus();
            return;
        }
        $('#nextdiv').toggle(true);
        jQuery('#Infor div').html('');
        addTitle();
        loadBookInfor();


        //e.preventDefault();
    })


    $("input[id^='quantity']").each(function(input){
        var value = $('input[id^="quanity"]').val();
        alert(value);
    })
    $('#nextdiv').hide();
    $(document).on('keyup mouseup change ', 'input[name="quantity"]', function(){

        setTimeout(function() {}, 10);
        var id = this.id; //quantity id
        var totalId ="totalprice";
        var priceId = "price";
        var roomfree = "roomfree";
        idnum = id[id.length -1]; // number of id
        totalId += idnum; //id of total price
        priceId += idnum;
        roomfree += idnum;
        var pick = 0 ;
        maxPick = 4;

        for(var i = 0; i < count; i++){
            if( Number($("#roomfree" +i).text())< maxPick)  {
                $("#quantity"+i).removeAttr("max");
                $("#quantity"+i).attr("max", Number($("#roomfree"+i).text()));
            }
            else if (Number($("#roomfree" +i).text()) >= maxPick ){
                $("#quantity"+i).removeAttr("max");
                $("#quantity"+i).attr("max", maxPick);
            }
        }
        for(var i = 0; i< count; i++){
            pick += Number($("#quantity" + i).val())
        }
        console.log(pick);

        if(pick < maxPick){
            $("#" + totalId).text(addCommas(Number($("#" + id).val()) * Number($("#" + priceId).text().replace(".",""))));
        }
        else if(pick == maxPick){
            $("#" + totalId).text(addCommas(Number($("#" + id).val()) * Number($("#" + priceId).text().replace(".",""))));
            for(var i = 0; i< count; i++){
                $("#quantity"+i).attr("max", $("#quantity"+i).val());
            }
        }
        else{
            return;
        }


    });



    $("#btnNext").click(function (e) {
        var quantity = 0;
        for(var i = 0; i < count; i++){
            quantity += Number($("#quantity" + i).val());

        }
        if(quantity == 0){
            alert('ss');
            return;
        }
        if(quantity > 0){
            window.open('/ConfirmView','_self');
        }


        //e.preventDefault();
    })
});
