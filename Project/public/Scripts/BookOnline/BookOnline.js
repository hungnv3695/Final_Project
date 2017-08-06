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
console.log(jQuery('#checkin').val());
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
        }


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
                alert('ssds');

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
                    alert('ssds');

                },
                error: function(){
                    alert('error');
                }
            });
        },60000)

    }

    $("#btnApply").click(function (e) {

        jQuery('#Infor div').html('');
        addTitle();
        loadBookInfor();


        //e.preventDefault();
    })


    $("input[id^='quantity']").each(function(input){
        var value = $('input[id^="quanity"]').val();
        alert(value);
    })
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
});