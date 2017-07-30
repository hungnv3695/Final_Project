/**
 * Created by Nguyen Viet Hung on 7/29/2017.
 */
$(document).ready(function(){
    var jList=[];
    var ROOM_STATUS = "RO02";
    var RES_STATUS = "RS05";

    jQuery('#txtCheckin').datetimepicker({
        format:'d/m/Y',
        onShow:function( ct ){
            this.setOptions({
                minDate:0,
                maxDate:jQuery('#txtCheckout').val()?jQuery('#txtCheckout').val():false
            })
        },
        timepicker:false,

        onSelectDate: function (date) {
            days();
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
            days();
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
        if($("#cboRoomNo").val()==""){
            $("#txtTotalprice").val("");
            return;
        }
        for (var i=0; i < jList.length; i++){

            if(roomType == jList[i].item0){
                $("#txtTotalprice").val(Number(jList[i].item3) * nights );
            }
        }
    });

    $("#btnCheckin").click(function () {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/K003_2/Checkin',
            method: 'GET',
            cache: false,
            dataType: 'json',
            data: $("#myForm").serialize() + "$room_status=" + ROOM_STATUS + "&res_status=" + RES_STATUS ,
            contentType: 'application/x-www-form-urlencoded',
            success: function (result) {

            },
            error: function(){
                alert('error');
            }
        });
        event.preventDefault();
    });
});