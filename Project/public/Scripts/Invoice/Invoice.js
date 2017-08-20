/**
 * Created by Nguyen Viet Hung on 8/19/2017.
 */

$(document).ready(function () {
    var service = GetUrlParameter('service');
    var quantity = GetUrlParameter('quantity');
    var price = GetUrlParameter('price');
    var user_name = GetUrlParameter('user_name');
    var customerName = GetUrlParameter('cusName');
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
    function addCommas(nStr)
    {
        nStr += '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(nStr)) {
            nStr = nStr.replace(rgx, '$1' + '.' + '$2');
        }
        return nStr;
    }

    function getInforToDisplay(service,quantity,price) {
        var serviceList = service.split(',');
        var quanList = quantity.split(',');
        var priceList = price.split(',');
        var totalPrice = 0;
        var VAT;
        var total = 0 ;
        var count = serviceList.length;

        $('#cusName').text(customerName);

        for(var i = 0; i < count; i++){
            $("#" +i + 1).append(i+1);
            $("#" +i + 2).append(serviceList[i]);
            $("#" +i + 3).append(quanList[i]);
            $("#" +i + 4).append(addCommas(priceList[i]));
            total = parseInt(quanList[i] * parseInt(priceList[i]));
            $("#" +i + 5).append(addCommas(total)  );

            totalPrice = totalPrice + parseInt(total);
        }



        $("#totalPrice").text(addCommas(totalPrice));
        VAT = totalPrice * 10 / 100;
        $("#VAT").text(addCommas(VAT));
        var total = (parseInt(totalPrice)+parseInt(VAT));
        $("#Total").append(addCommas(total));

        $(".receptionist-name").text(user_name);
        $(".customer-name").text(customerName);

    }
    getInforToDisplay(service,quantity,price);
    window.print();
});