/**
 * Created by Nguyen Viet Hung on 8/3/2017.
 */
$(document).ready(function () {
    //var night = ;
    var iList = "";
    var idList = [];
    var res_id = GetUrlParameter('res_id');
    var resDetail_id = GetUrlParameter('resDetail_id');
    var invoice_id = GetUrlParameter('invoice_id');

    function loadService(invoice_id,room_id){
        $.ajax({
            url: 'Checkout/LoadService',
            method: 'GET',
            cache: false,
            dataType: 'json',
            data:{
                room_id: room_id,
                invoice_id: invoice_id
            },

            contentType: 'application/json; charset=utf-8',
            success: function (result) {
                addData(result);
            },
            error: function(){
                alert('error');
            }

        });
    }



    $('#btnSearch').attr("disabled", false);
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
            $("#txtTotalprice").val(addCommas(result[0].price));

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
            loadService(invoice_id,result[0].room_id);
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
            'ddd ',
            'Dịch vụ',
            'Số lượng',
            'Đơn giá',
            'Thành tiền',
            'Trạng thái'

        ],
        colModel: [
            { name: 'item0',hidden:true,search : false,  width: 90 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item1',search : false,  width: 90 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item2',search : false,  width: 90 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item3',search : false,  width: 90 , align: "left", formatter:'integer', formatoptions:{thousandsSeparator: "."}},
            { name: 'item4',search : false,  width: 90 , align: "left",formatter:'integer', formatoptions:{thousandsSeparator: "."}},
            { name: 'item5', hidden:true}
        ],
        rownumbers: true,
        height: 200,
        width: 400,
        rowNum: 10,
        autoheight: true,
        loadonce: true,
        resizable: true,
        forceFit: true,
        shrinkToFit: false

    });
    function addData(result){
        var jList=[];
        for(var i = 0; i< result.length; i++){
            var x ={
                item0: result[i].id,
                item1: result[i].item_id,
                item2: result[i].quantity,
                item3: result[i].price,
                item4: result[i].price * result[i].quantity ,
                item5: result[i].payment_flag

            };
            jList.push(x);
        }
        console.log(jList);
        jQuery("#jqGrid").setGridParam({data: jList });
        jQuery("#jqGrid")[0].refreshIndex();
        jQuery("#jqGrid").trigger("reloadGrid");
    }
    function getItemNoPaymentFlag() {
        var  count=$("#jqGrid").jqGrid('getGridParam', 'records');
        idList = [];
        iList = "";
        var pList = "";
        var total = "";
        for(var i = 1; i <= count; i++){
            var flag = $("#jqGrid").jqGrid('getCell', i , 'item5');

            if(flag == 0){
                var id = $("#jqGrid").jqGrid('getCell', i, 'item0');
                if(iList==""){
                    iList = id;
                }
                else {
                    iList = iList + "," + id;
                }

            }

        }

    }
    $("#btnCheckout").click(function (event) {
        event.preventDefault();
        getItemNoPaymentFlag();

        $.ajax({
            url: 'Checkout/SaveCheckOut',
            method: 'GET',
            cache: false,
            dataType: 'json',
            data:{
                invoice_id : invoice_id,
                room_id: $("#cboRoomNo").val(),
                resDetail_id : resDetail_id,
                res_id : res_id,
                iList : iList
            },

            contentType: 'application/json; charset=utf-8',
            success: function (result) {
                if(result == 1){
                    alert('check-out thành công');
                    //window.open('/checkoutList','_self')
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

    $("#btnBack").click(function () {
        window.open('/checkoutList','_self');
    })
});
