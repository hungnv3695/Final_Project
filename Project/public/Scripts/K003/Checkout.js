/**
 * Created by Nguyen Viet Hung on 8/3/2017.
 */
$(document).ready(function () {
    //var night = ;

    var res_id = GetUrlParameter('res_id');
    var resDetail_id = GetUrlParameter('resDetail_id');

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
        nStr = nStr.replace(".","");
        return nStr;
    }
    jQuery('#txtCheckin').datetimepicker({
        format:'d/m/Y',
        onShow:function( ct ){
            this.setOptions({
                maxDate:jQuery('#txtCheckout').val()?jQuery('#txtCheckout').val():'-1969/10/31',
                minDate:'-1969/12/25',
            })
        },
        timepicker:false
    });
    jQuery('#txtCheckout').datetimepicker({
        format:'d/m/Y',
        onShow:function( ct ){
            this.setOptions({
                minDate:jQuery('#txtCheckin').val()?jQuery('#txtCheckin').val():false

            })
        },
        timepicker:false
    });



    $.ajax({
        url: 'Checkout/LoadResDetail',
        method: 'GET',
        cache: false,
        dataType: 'json',
        data:{
            resDetail_id : resDetail_id
        },

        contentType: 'application/json; charset=utf-8',
        success: function (result) {

            $("#txtCheckin").datetimepicker({value:result[0].date_in ,  });
            $("#txtCheckout").datetimepicker({value:result[0].date_out ,  });
            $("#txtTotalprice").val(addCommas(result[0].total_room));

            $("#roomtype").append($('<option selected></option>').val(result[0].room_type_id).html(result[0].type_name));
            $("#cboRoomNo").append($('<option selected></option>').val(result[0].room_id).html(result[0].room_number));
            $("#txtNote").val(result[0].res_note);

            $("#txtFullname1").val(result[0].name);
            $("#txtIdcard1").val(result[0].identity_card);
            $("#txtPhone1").val(result[0].phone);
            $("#txtEmail1").val(result[0].mail);

            $("#txtFullname2").val(result[0].customer_name);
            $("#txtIdcard2").val(result[0].customer_identity_card);
            $("#txtPhone2").val(result[0].customer_phone);
            $("#txtEmail2").val(result[0].customer_email);
            $("#txtNote2").val(result[0].resDetail_note);


            var a,b,c;

            if(($("#txtCheckin").val()=="") || ($("#txtCheckout").val()=="")){
                return;
            }
            a = $("#txtCheckin").datetimepicker('getValue').getTime(),
                b = $("#txtCheckout").datetimepicker('getValue').getTime(),
                c = 24*60*60*1000,
                diffDays = Math.round(Math.abs((a - b)/(c)));
            // d = ('20/10/2017').datetimepicker('getValue').getTime();
            // console.log(d);
            $("#txtNumOfDay").val(diffDays);
        },
        error: function(){
            alert('error');
        }
    });


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

    $("#jqGrid").jqGrid({
        datatype: "local",
        mtype: "GET",


        styleUI : 'Bootstrap',
        colNames:[
            ' ',
            'Kiểu phòng',
            'Số lượng',
            'Giá',
            ' ',
            ' '

        ],
        colModel: [
            { name: 'item0',hidden:true},
            { name: 'item1',search : false,  width: 90 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item2',search : false,  width: 90 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item3',search : false,  width: 90 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item4',hidden:true},
            { name: 'item5',hidden:true}
        ],
        rownumbers: true,
        height: 200,
        width: 310,
        rowNum: 10,
        autoheight: true,
        loadonce: true,
        resizable: true,
        forceFit: true,
        shrinkToFit: false

    });
    
    $("#btnCheckout").click(function (event) {
        event.preventDefault();
        $.ajax({
            url: 'Checkout/SaveCheckOut',
            method: 'GET',
            cache: false,
            dataType: 'json',
            data:{
                room_id: $("#roomtype").val(),
                resDetail_id : resDetail_id,
                res_id : res_id
            },

            contentType: 'application/json; charset=utf-8',
            success: function (result) {
                if(result == 1){
                    alert('check-out thành công');
                    window.open('/checkoutList','_self')
                }
                else{
                    alert('check-out lỗi');
                }

            },
            error: function(){
                alert('error');
            }

        });
        event.preventDefault();
    })

});
