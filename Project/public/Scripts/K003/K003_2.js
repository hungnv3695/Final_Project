/**
 * Created by Nguyen Viet Hung on 7/29/2017.
 */
$(document).ready(function(){
    var jList=[];
    var ROOM_STATUS = "RO02";
    var RES_STATUS = "RS05";
    var res_id = GetUrlParameter("res_id");
    var room_id = GetUrlParameter("room_id");
    var room_number = "";
    var room_type = "";
    var price = 0;
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


    jQuery('#txtCheckin').datetimepicker({
        format:'d/m/Y',
        onShow:function( ct ){
            this.setOptions({
                minDate:0,
                maxDate:0
            })
        },
        timepicker:false,

        onSelectDate: function (date) {
            //days();
        }
    });
    jQuery('#txtCheckout').datetimepicker({
        format:'d/m/Y',
        onShow:function( ct ){
            this.setOptions({
                minDate:jQuery('#txtCheckin').val()?jQuery('#txtCheckin').val():false
            })
        },
        timepicker:false,

        onSelectDate: function (date) {
            //days();
        }
    });
    $.datetimepicker.setLocale('vi');

    function days() {
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
    }

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
            ' ',

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





    function checkIsReservation($res_id) {
        if($res_id != ""){

            $("#txtCheckin").attr('readonly', true);
            $("#txtCheckout").attr('readonly', true);
            $("#btnSearch").attr('disabled', 'disabled');
            $("#txtFullname1").attr('readonly', true);
            $("#txtIdcard1").attr('readonly', true);
            $("#txtPhone1").attr('readonly', true);
            $("#txtEmail1").attr('readonly', true);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/K003_2/CheckIsReservation',
                method: 'GET',
                cache: false,
                dataType: 'json',
                data: {
                    res_id : $res_id,
                    room_id : room_id
                },
                contentType: 'application/x-www-form-urlencoded',
                success: function (result) {
                    console.log(result[0].type_name);
                    $("#txtCheckin").val(result[0].check_in);
                    $("#txtCheckout").val(result[0].check_out);
                    //$("#roomtype").text(result[0].type_name).prop('selected', true);room_type_id
                    $("#roomtype").append($('<option selected></option>').val(result[0].room_type_id).html(result[0].type_name));
                    $("#cboRoomNo").append($('<option selected></option>').val(result[0].room_id).html(result[0].room_number));
                    //$("#cboRoomNo").text(result[0].room_number);
                    $("#numofpeople").val(result[0].number_of_adult);
                    $("#txtNote").val(result[0].note);

                    $("#txtFullname1").val(result[0].name);
                    $("#txtIdcard1").val(result[0].identity_card);
                    $("#txtPhone1").val(result[0].phone);
                    $("#txtEmail1").val(result[0].mail);
                    //$("#numofpeople").val(result[0].number_of_adult);

                    $("#txtFullname2").attr('readonly', false);
                    $("#txtIdcard2").attr('readonly', false);
                    $("#txtPhone2").attr('readonly', false);
                    $("#txtEmail2").attr('readonly', false);


                    $("#txtFullname2").val(result[0].customer_name);
                    $("#txtIdcard2").val(result[0].customer_identity_card);
                    $("#txtPhone2").val(result[0].customer_phone);
                    $("#txtEmail2").val(result[0].customer_email);
                    $("#txtNote2").val(result[0].note2);



                    return;

                },
                error: function(){
                    alert('error');
                }
            });
        }else{
            return;
        }
    }
    checkIsReservation(res_id);



    function addData(result){
        jList=[];
        console.log(result);
        for(var i = 0; i< result.length; i++){
            var x ={
                item0: result[i].room_type_id,
                item1: result[i].type_name,
                item2: result[i].Count,
                item3: result[i].price,
                item4: result[i].list_room,
                item5: result[i].list_room_id
            };
            jList.push(x);
        }
        console.log(jList);
        jQuery("#jqGrid").setGridParam({data: jList });
        jQuery("#jqGrid")[0].refreshIndex();
        jQuery("#jqGrid").trigger("reloadGrid");
    }
    function searchRoomType(check_in,check_out) {
        $.ajax({
            url: 'K003_2/SearchRoomTypeFree',
            method: 'GET',
            cache: false,
            dataType: 'json',
            data:{
                check_in  : check_in,
                check_out : check_out
            },

            contentType: 'application/json; charset=utf-8',
            success: function (result) {
                addData(result);
                $("#roomtype").find('option').remove();
                $("#roomtype").append($('<option selected></optionselected>').val("").html(""));
                for (i=0; i < jList.length; i++){
                    //add data for status combobox
                        $("#roomtype").append($('<option></option>').val(result[i].room_type_id).html(result[i].type_name));
                }
                $("#cboRoomNo").find('option').remove();


            },
            error: function(){
                alert('error');
            }
        });

    }


    $("#btnSearch").click(function (event) {
        event.preventDefault();
        days();
        var check_in = $("#txtCheckin").val();
        var check_out = $("#txtCheckout").val();
        jQuery("#jqGrid").jqGrid("clearGridData");
        jQuery("#jqGrid")[0].refreshIndex();
        jQuery("#jqGrid").trigger("reloadGrid");
        searchRoomType(check_in,check_out);
        event.preventDefault();

    });

    $("#roomtype").change(function () {
        $("#cboRoomNo").find('option').remove();
        $("#txtTotalprice").val("");
        var roomType = $("#roomtype").val();
        var roomNo = [];
        var roomId = [];
        var room_type_id = $("#roomtype").val();
        room_type =  $("#roomtype option[value='"+    room_type_id +"']").text()
        for (var i=0; i < jList.length; i++){

            if(roomType == jList[i].item0){
                roomNo = (jList[i].item4).split(' ');
                roomId = (jList[i].item5).split(' ');
                $("#cboRoomNo").append($('<option selected></option>').val("").html(""));
                for(var j = 0; j < roomNo.length; j++){
                    $("#cboRoomNo").append($('<option></option>').val(roomId[j]).html(roomNo[j]));
                }

            }
        }
    });

    $("#cboRoomNo").change(function () {
        $("#txtTotalprice").val()=="";
        var roomType = $("#roomtype").val();
        var nights = $("#txtNumOfDay").val();
        var roomVal =$("#cboRoomNo").val();
        room_number = $("#cboRoomNo option[value='"+    roomVal+"']").text()

        if($("#cboRoomNo").val()==""){
            $("#txtTotalprice").val("");
            return;
        }
        for (var i=0; i < jList.length; i++){

            if(roomType == jList[i].item0){
                $("#txtTotalprice").val(addCommas(Number(jList[i].item3) * nights ));
                price = Number(jList[i].item3);
            }
        }
    });
    $("#btnBack").click(function (event) {
        event.preventDefault();
        window.open('/K004_1/K004_2?res_id='+res_id, '_self');
    });


    $("#btnCheckin").click(function (event) {
        event.preventDefault();

        if( $("#txtCheckin").val() == "" || $("#txtCheckout").val() == ""){
            alert('Chọn ngày vào và ngày ra trước khi ấn nút [Nhận phòng]');
            return;
        }
        if ($("#roomtype").val() == "" || $("#cboRoomNo").val() == ""){
            alert('Chọn kiểu phòng và sô phòng trước khi ấn nút [Nhận phòng]');
            return;
        }
        if($("#txtFullname1").val() == "" || $("#txtIdcard1").val() == ""){
            alert('Nhập tên người đặt và CMND trước khi ấn nút [Nhận phòng]');
            return;
        }
        if($("#txtPhone1").val() == "" || $("#txtEmail1").val() == ""){
            $("#txtPhone1").val("");
            $("#txtEmail1").val("");
        }

        if(res_id == "" || res_id === undefined){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/K003_2/Checkin',
                method: 'GET',
                cache: false,
                dataType: 'json',
                data: $("#myForm").serialize() + "&room_status=" + ROOM_STATUS + "&res_status=" + RES_STATUS + "&room_number=" + room_number + "&room_type=" + room_type + "&price=" + price ,
                contentType: 'application/x-www-form-urlencoded',
                success: function (result) {
                    if(result==1){
                        alert('Check-in thành công');
                        location.reload();
                    }
                    else if(result==0){
                        alert('Xảy ra lỗi khi check-in');
                    }
                },
                error: function(){
                    alert('error');
                }
            });
        }
        else if(res_id != "" && res_id != undefined){

            if($("#txtFullname2").val() == "" || $("#txtIdcard2").val() == ""){
                alert('Nhập tên người nhận và CMND trước khi ấn nút [Nhận phòng]');
                return;
            }

            if($("#txtPhone2").val() == "" || $("#txtEmail2").val() == ""){
                $("#txtPhone2").val("");
                $("#txtEmail2").val("");
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/K003_2/Checkin',
                method: 'GET',
                cache: false,
                dataType: 'json',
                data: $("#myForm").serialize() + "&room_status=" + ROOM_STATUS + "&res_status=" + RES_STATUS + "&res_id=" + res_id + "&room_id=" + room_id,
                contentType: 'application/x-www-form-urlencoded',
                success: function (result) {
                    if(result==1){
                        alert('Check-in thành công');
                        window.open('/K004_1/K004_2?res_id='+res_id, '_self');
                        location.reload();
                    }
                    else if(result==0){
                        alert('Xảy ra lỗi khi check-in');
                    }
                },
                error: function(){
                    alert('error');
                }
            });

        }
        event.preventDefault();

    });

    $("#ckbsamepeople").click(function () {
        if($("#ckbsamepeople").prop('checked') == true){
            $("#txtFullname2").val($("#txtFullname1").val());
            $("#txtIdcard2").val( $("#txtIdcard1").val());
            $("#txtPhone2").val($("#txtPhone1").val());
            $("#txtEmail2").val($("#txtEmail1").val());

    }else{
            $("#txtFullname2").val("");
            $("#txtIdcard2").val("");
            $("#txtPhone2").val("");
            $("#txtEmail2").val("");
    }
    });

    $("#btnSave").click(function (event) {
        event.preventDefault();

        var fullname2 = $("#txtFullname2").val();
        var idCard2 = $("#txtIdcard2").val();
        var phone2 = $("#txtPhone2").val();
        var email2 = $("#txtEmail2").val();

        var note2 = $("#txtNote2").val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/K003_2/SaveInforCustomer',
            method: 'GET',
            cache: false,
            dataType: 'json',
            data: {
                fullname2 : fullname2,
                idCard2 : idCard2,
                phone2 : phone2,
                email2 : email2,
                note2: note2,
                res_id: res_id,
                room_id: room_id
            },
            contentType: 'application/x-www-form-urlencoded',
            success: function (result) {
                if(result==1){
                    alert('Lưu thông tin thành công');
                    //location.reload();
                }
                else if(result==0){
                    alert('Xảy ra lỗi khi lưu thay đổi');
                }
            },
            error: function(){
                alert('error');
            }
        });
        event.preventDefault();


    })
});