/**
 * Created by Nguyen Viet Hung on 8/7/2017.
 */
$(document).ready(function () {
    var countRoom = GetUrlParameter('countRoom');
    var roType = GetUrlParameter('roType');
    var roQuan = GetUrlParameter('roQuan');
    var roPrice = GetUrlParameter('roPrice');
    var nights = GetUrlParameter('nights');

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
        room_type = [];
        room_quantity = [];
        room_price = [];
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
        $("#Total").text(addCommas(c + (c*10/100)));
    }
    splitInfor(roType,roQuan,roPrice);
    //================================
    $("#btnBook").click(function () {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/Book/ConfirmView/BookRoomOnline',
            method: 'GET',
            cache: false,
            dataType: 'json',
            data: $("#myForm").serialize() + "&room_type=" + room_type + "&room_quantity" + room_quantity + "&room_price_total="+ room_price_total,
            contentType: 'application/x-www-form-urlencoded',
            success: function (result) {
            },
            error: function(){
                alert('error');
            }
        });

    })



});
