/**
 * Created by Nguyen Viet Hung on 7/29/2017.
 */
$(document).ready(function(){
    var jList=[];
    jQuery('#txtCheckin').datetimepicker({
        format:'d/m/Y',
        onShow:function( ct ){
            this.setOptions({
                minDate:0,
                maxDate:jQuery('#txtCheckout').val()?jQuery('#txtCheckout').val():false
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
        timepicker:false,

        onSelectDate: function (date) {
            days();
        }
    });
    $.datetimepicker.setLocale('vi');

    function days() {
        var a = $("#txtCheckin").datetimepicker('getValue').getTime(),
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
            ' '

        ],
        colModel: [
            { name: 'item0',hidden:true},
            { name: 'item1',search : false,  width: 90 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item2',search : false,  width: 90 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item3',search : false,  width: 90 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item4',hidden:true},
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
                item4: result[i].list_room
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


    $("#btnSearch").click(function () {
        var check_in = $("#txtCheckin").val();
        var check_out = $("#txtCheckout").val();
        jQuery("#jqGrid").jqGrid("clearGridData");
        jQuery("#jqGrid")[0].refreshIndex();
        jQuery("#jqGrid").trigger("reloadGrid");
        searchRoomType(check_in,check_out);


    });

    $("#roomtype").change(function () {
        var roomType = $("#roomtype").val();
        var roomNo = [];

        for (var i=0; i < jList.length; i++){

            if(roomType == jList[i].item0){
                roomNo = (jList[i].item4).split(' ');
                $("#cboRoomNo").append($('<option selected></option>').val("").html(""));
                for(var j = 0; j < roomNo.length; j++){
                    $("#cboRoomNo").append($('<option></option>').val(roomNo[j]).html(roomNo[j]));
                }


            }
        }
    });

    $("#cboRoomNo").change(function () {
        var roomType = $("#roomtype").val();
        var nights = $("#txtNumOfDay").val();
        for (var i=0; i < jList.length; i++){

            if(roomType == jList[i].item0){
                $("#txtTotalprice").val(Number(jList[i].item3) * nights );
            }
        }
    });
});