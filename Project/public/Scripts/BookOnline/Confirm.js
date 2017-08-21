/**
 * Created by Nguyen Viet Hung on 8/7/2017.
 */
$(document).ready(function () {
    var countRoom = GetUrlParameter('countRoom');
    var roType = GetUrlParameter('roType');
    var roQuan = GetUrlParameter('roQuan');
    var roPrice = GetUrlParameter('roPrice');
    var nights = GetUrlParameter('nights');
    var checkin = GetUrlParameter('check_in');
    var checkout = GetUrlParameter('check_out');
    var adult = GetUrlParameter('adult');
    var children = GetUrlParameter('children');
    var room_type = [];
    var room_quantity = [];
    var room_price = [];
    var room_price_total = 0;

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
        nStr+="";
        nStr = nStr.replace(/\./g,"");
        return nStr;
    }


    function GetUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };

    //Cắt chuỗi lấy thông tin từ URL
    function splitInfor(roType,roQuan,roPrice){


        room_price_total = 0;
        room_type = roType.split(",");
        room_quantity = roQuan.split(",");
        room_price = roPrice.split(",");

        for(var i = 0; i < Number(countRoom); i++){
            $("#BookInfor").append(
                '<div class="col-md-4">'
                +   '<div class="form-group">'
                +   '<span class="fa fa-home" style="margin-right:5px;"></span><label><b>'+room_type[i]+'</b></label>'
                +   '</div>'
                +'</div>'
                +'<div class="col-md-3 col-md-offset-1" >'
                +   '<div class="form-group">'
                +   '<label><b>'+room_quantity[i]+'</b></label>'
                +   '</div>'
                +'</div>'
                +'<div class="col-md-3 col-md-offset-0">'
                +   '<div class="form-group">'
                +   '<label><b>'+addCommas(room_price[i])+'</b></label>'
                +   '</div>'
                +'</div>'
            );
            room_price_total += Number(room_price[i]);
        }

        $("#nights").text(nights);

        $("#roomPrice").text(addCommas(room_price_total));

        var a = Number(room_price_total),
            b = Number(nights),
            c = a * b;
        $("#lbVAT").text(addCommas(c*10/100));
        $("#Total").text(addCommas(c + (c*10/100)));

        $("#spCheckin").text(checkin);
        $("#spCheckout").text(checkout);

    }
    splitInfor(roType,roQuan,roPrice);
    //================================
    $("#btnBook").click(function (event) {
        event.preventDefault();
        if(($("#txtFullname").val() || $("#txtIdcard").val() || $("#txtPhone").val()
        || $("#txtEmail").val()) == "") {
            alert('Vui lòng điền đầy đủ thông tin trước khi nhận phòng');
            return;
        }

        var roomPrice = removeCommas($("#roomPrice").text());

        var total = removeCommas($("#Total").text());
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/Book/ConfirmView/BookRoomOnline',
            method: 'GET',
            cache: false,
            dataType: 'json',
            data: $("#myForm").serialize() + "&room_type=" + room_type + "&room_quantity=" + room_quantity +
            "&total="+ total + "&check_in=" + checkin + "&check_out=" + checkout + "&countRoom="+countRoom
            +"&adult="+adult+"&children="+children + "&nights=" + nights + "&roomPrice="+roomPrice,
            contentType: 'application/x-www-form-urlencoded',
            success: function (result) {
                if(result == 1){
                    alert('Đặt phòng thành công');
                    window.open('/','_self');
                }
                else if(result == 0){
                    alert('xảy ra lỗi');
                }
            },
            error: function(){
                alert('error');
            }
        });
        event.preventDefault();
    })



});
