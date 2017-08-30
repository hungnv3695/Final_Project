/**
 * Created by Nguyen Viet Hung on 8/3/2017.
 */
$(document).ready(function () {
    var serList = "";
    var quanList = "";
    var priList = "";
    var jList=[];
    var nights = 0;
    var diffDays = 0;
    var room_price;
    var iList = "";
    var addList = [];
    var totalList = "";
    var res_id = GetUrlParameter('res_id');
    var resDetail_id = GetUrlParameter('resDetail_id');
    var invoice_id = GetUrlParameter('invoice_id');
    var user_name = "";

    function GetUserName() {
        $.ajax({
            url: 'Checkout/GetUserName',
            method: 'GET',
            cache: false,
            dataType: 'json',

            contentType: 'application/json; charset=utf-8',
            success: function (result) {
                user_name = result;
            },
            error: function(){
                alert('error1');
            }

        });
    }
    GetUserName();
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
        nStr = nStr.replace(/\./g , "");
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

            var a,b,c;

            if(($("#txtCheckin").val()=="") || ($("#txtCheckout").val()=="")){
                return;
            }
            a = $("#txtCheckin").datetimepicker('getValue').getTime(),
                b = $("#txtCheckout").datetimepicker('getValue').getTime(),
                c = 24*60*60*1000,
                diffDays = Math.round(Math.abs((a - b)/(c)));
            // d = ('20/10/2017').datetimepicker('getValue').getTime();
            room_price = result[0].room_price;
            if(result[0].payment_flag == 1){
                $("#btnCalculate").attr('disabled','disabled');
            }
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
            'Trạng thái',
            '',
            ''

        ],
        colModel: [

            { name: 'item0',hidden:true,search : false, width: 90 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item6',search : false,  width: 120 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item2',search : false,  width: 70 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item3',search : false,  width: 90 , align: "left", formatter:'integer', formatoptions:{thousandsSeparator: "."}},
            { name: 'item4',search : false,  width: 90 , align: "left",formatter:'integer', formatoptions:{thousandsSeparator: "."}},
            { name: 'item5', hidden:true},
            { name: 'item1', hidden:true},
            { name: 'item7', hidden:true},
        ],
        rownumbers: true,
        height: 200,
        width: 420,
        rowNum: 10,
        autoheight: true,
        loadonce: true,
        resizable: true,
        forceFit: true,
        shrinkToFit: false,
        cellEdit:true,
        add:true,
        edit:true,
        editable: true,

        loadComplete: function () {

            var $grid = $('#jqGrid');
            var colSum = 0;

            var  count=$("#jqGrid").jqGrid('getGridParam', 'records');
            for(var i = 1; i <= count; i++){
                var flag = $("#jqGrid").jqGrid('getCell', i , 'item5');

                if(flag == 1){
                    $("tr.jqgrow#" + i).css("background", "#00CC00");
                }
                else{
                    colSum = (colSum) + parseInt((removeCommas($grid.jqGrid('getCell',i, 'item4'))));

                    $("tr.jqgrow#" +i).css("background", "#FCDAD5");
                }

            }
            var VAT = colSum * 10 / 100;
            var totalprice = colSum + VAT;
            $("#txtPrice").val(addCommas(colSum));
            $("#txtVAT").val(addCommas(VAT));
            $("#txtTotalPrice").val(addCommas(totalprice));


        },

    });

   // jQuery("#jqGrid").jqGrid('navGrid', "#pager", { edit: true, add: false, del: false, search : false });
    // Custom formatter for a cell in a jqgrid row.

    function addData(result){
        jList=[];
        for(var i = 0; i< result.length; i++){
            var x ={
                item0: result[i].id,
                item1: result[i].item_id,
                item2: result[i].quantity,
                item3: result[i].price,
                item4: result[i].price * result[i].quantity ,
                item5: result[i].payment_flag,
                item6: result[i].item_name

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
        serList = "";
        quanList = "";
        priList = "";
        iList = "";
        var pList = "";
        var total = "";
        for(var i = 1; i <= count; i++){
            var flag = $("#jqGrid").jqGrid('getCell', i , 'item5');
            var flagAdd = $("#jqGrid").jqGrid('getCell', i , 'item7');
            if(flag == 0){
                var id = $.trim($("#jqGrid").jqGrid('getCell', i, 'item0'));
                var total = $("#jqGrid").jqGrid('getCell', i, 'item4');
                var a = parseInt(removeCommas(total)) * 10 / 100;
                var b  = parseInt(removeCommas(total)) + a;
                if(iList==""){
                    iList = id;
                    totalList = b;
                }
                else if(iList != "" && iList !== undefined && id != ""){
                    iList = iList + "," + id;
                    totalList = totalList + "," + b;
                }
                console.log(iList);
            }

            if(flagAdd == 1){
                var ser = $("#jqGrid").jqGrid('getCell', i, 'item6');
                var pri = $("#jqGrid").jqGrid('getCell', i, 'item3');
                var quan = $("#jqGrid").jqGrid('getCell', i, 'item2');
                if(serList==""||quanList==""||priList==""){
                    serList = ser;
                    quanList = quan;
                    priList = pri;
                }else {
                    serList = serList + "," + ser;
                    quanList = quanList + "," + quan;
                    priList = priList + "," + pri;
                }

            }

        }

    }

    $("#btnCheckout").click(function (event) {
        event.preventDefault();

        var confirm = window.confirm('Xác nhận check-out');
        if(confirm==true){
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
                    iList : iList,
                    totalList: totalList,
                    date_out: $("#txtCheckout").val(),
                    serList : serList,
                    quanList : quanList,
                    priList : priList
                },

                contentType: 'application/json; charset=utf-8',
                success: function (result) {
                    if(result == 1){
                        alert('check-out thành công');
                        $('#btnCheckout').attr('disabled',true);
                        $("#txtServiceAdd").attr('disabled',true);



                        $("#txtQuanAdd").attr('disabled',true);
                        $("#txtAmountAdd").attr('disabled',true);
                        $("#btnAdd").attr('disabled',true);
                        if(iList == "" && serList == ""){
                            $("#btnPrint").attr('readonly',true);
                            window.open('/CheckoutList','_self');
                        }else if (iList != ""  || serList != "" ){
                            $('#btnPrint').attr('disabled',false);
                        }
                    }
                    else{
                        alert('check-out lỗi');
                    }

                },
                error: function(){
                    alert('error');
                }

            });
        }else if (confirm==false){
            return;
        }

        event.preventDefault();
    })

    $("#btnBack").click(function (event) {
        event.preventDefault();
        window.open('/CheckoutList','_self');
        event.preventDefault();
    })

    $("#btnCalculate").click(function (event) {
        event.preventDefault();
        nights = $("#txtNumOfDay").val();
        var newTotal = "";
        if(nights == 0){
            $("#txtTotalprice").val(addCommas(room_price));
            newTotal = $("#txtTotalprice").val();
        }
        else if (nights > 0){
            $("#txtTotalprice").val(addCommas(room_price * nights));
            newTotal = $("#txtTotalprice").val();
        }

        var  count=$("#jqGrid").jqGrid('getGridParam', 'records');
        console.log(removeCommas(newTotal));
        for(var i=1;i<=count;i++){
            var room_id = $("#jqGrid").jqGrid('getCell', i, 'item1');
            if(room_id == $('#cboRoomNo').val()){
                $("#jqGrid").jqGrid('setCell', i, 'item3', removeCommas(newTotal));
                $("#jqGrid").jqGrid('setCell', i, 'item4', removeCommas(newTotal));
            }
        }
        jQuery("#jqGrid")[0].refreshIndex();
        jQuery("#jqGrid").trigger("reloadGrid");
        event.preventDefault();
    })

    $("#btnAdd").click(function (event) {
        event.preventDefault();

        var sList = [];
        var serviceAdd = $("#txtServiceAdd").val();
        var quantityAdd = $("#txtQuanAdd").val();
        var priceAdd = $("#txtAmountAdd").val();
        if(serviceAdd == "" || quantityAdd == "" || priceAdd == ""){
            return;
        }else{
            var x = {
                item6 : serviceAdd,
                item2 : quantityAdd,
                item3 : priceAdd,
                item4 : parseInt(quantityAdd) * parseInt(priceAdd),
                item7 : 1,
            }
            jList.push(x);
            jQuery("#jqGrid").setGridParam({data: jList });
            jQuery("#jqGrid")[0].refreshIndex();
            jQuery("#jqGrid").trigger("reloadGrid");
        }
        $("#txtServiceAdd").val('');
        $("#txtQuanAdd").val('');
        $("#txtAmountAdd").val('');
        event.preventDefault();
    })

    $("#btnPrint").click(function (event) {
        event.preventDefault();
        var name = $("#txtFullname2").val();
        var count=$("#jqGrid").jqGrid('getGridParam', 'records');
        var service = [];
        var quantity = [];
        var price = [];
        var customerName = $("#txtFullname2").val();
        for(var i = 1; i<= count; i++){
            var flag = $("#jqGrid").jqGrid('getCell', i, 'item5');
            if(flag != "1"){
                service.push($("#jqGrid").jqGrid('getCell', i, 'item6'));
                quantity.push($("#jqGrid").jqGrid('getCell', i, 'item2'));
                price.push(removeCommas($("#jqGrid").jqGrid('getCell', i, 'item3')));
            }

        }

        window.open('/Invoice?' +"service=" + service + "&quantity=" + quantity + "&price="+price +
            "&cusName="+customerName + "&user_name="+encodeURIComponent(user_name),'_blank');
        window.open('/CheckoutList','_self');


        event.preventDefault();
    })


});
