/**
 * Created by Nguyen Viet Hung on 7/12/2017.
 */
$(document).ready(function () {
    var roList = [];
    $res_id = $('#txtResId').val();
    var detail_id=[];
    $("#jqGrid").jqGrid({
        datatype: "local",
        mtype: "GET",

        styleUI : 'Bootstrap',
        colNames:[
            ' ',
            'No.Room',
            ' '
        ],
        colModel: [
            { name: 'item0',  width: 40 , align: "left", sorttype: "text", sortable: false, formatter: function (cellvalue, options) {
                return addCheckbox(options.rowId);
            }},
            { name: 'item1',  width: 135 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item2', hidden: true, width: 130 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }}
        ],
        rownumbers: true,
        height: 200,
        width: 210,
        rowNum: 10,
        autoheight: true,
        loadonce: true,
        resizable: true,
        forceFit: true,
        shrinkToFit: false,


        onSelectRow: function(id,status){
            var count_checked = jQuery("#jqGrid").find('input[type=checkbox]:checked').length;

            var ch =  jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked');
            if(ch) {
                jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked',false);
            } else {
                jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked',true);
                selRowId = $('#jqGrid').jqGrid ('getGridParam', 'selrow');
                celValue = $('#jqGrid').jqGrid ('getCell', selRowId, 'item2');
                roList.push(celValue);
            }
            if(count_checked > 2){
                return;
            }else if(count_checked == 2){

                var ch =  jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked',false);
                if(ch) {
                    jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked',false);
                }
            }
        },
        loadComplete: function(){
            $("tr.jqgrow:even").css("background", "#DDDDDC");
            checkroom($res_id);
        }

    });

    $( ".ui-th-div" ).append( "<p>No.</p>" );

    function addCheckbox(id) {
        return "<input type='checkbox' id='"+ id + "' disabled='disabled'>" ;
    }

    function  searchData(res_id,check_in,check_out,type_name) {

        console.log($check_in,$check_out,$type_name);
        $.ajax({
            url: '/K004_1/K004_2/K004_3/GetRoomFree',
            method: 'GET',
            cache: false,
            data:{
                res_id: $res_id,
                check_in:  $check_in ,
                check_out: $check_out,
                type_name: $type_name
            },
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            success: function (result) {

                addData(result);

            },
            error: function(){
                alert('error');
            }
        });
    }
    function addData(result){
        var jList=[];
        for(var i = 0; i< result.length; i++){
            var x ={
                item1: result[i].room_number,
                item2: result[i].room_id
            };
            jList.push(x);
        }
        console.log(jList);
        jQuery("#jqGrid").setGridParam({data: jList });
        jQuery("#jqGrid")[0].refreshIndex();
        jQuery("#jqGrid").trigger("reloadGrid");
    }
    function  checkroom(res_id) {

        $.ajax({
            url: '/K004_1/K004_2/K004_3/CheckRoom',
            method: 'GET',
            cache: false,
            data:{
                res_id: $res_id,
            },
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            success: function (result) {
                var count=jQuery("#jqGrid").jqGrid('getGridParam', 'records');
                for(var j = 0; j< count; j++){
                var celValue = $('#jqGrid').jqGrid ('getCell', j+1 , 'item2');
                    console.log(celValue);
                    detail_id=[];
                    for(var i = 0; i < result.length; i++){
                            detail_id.push(result[i].id);
                            if(celValue == result[i].room_id){
                                var a = j + 1;
                                jQuery("#jqGrid").find('#'+ a +' input[type=checkbox]').prop('checked',true);
                                break;
                            }
                    }
                }
                console.log(detail_id);
            },
            error: function(){
                alert('error');
            }
        });
    }
    btnSave
    $("#btnSave").click(function() {
        var ch =  jQuery("#jqGrid").find('#'+id+' input[type=checkbox]').prop('checked',true);

        $.ajax({
            url: '/K004_1/K004_2/K004_3/SaveRoom',
            method: 'GET',
            cache: false,
            data:{
                res_id: $res_id,
                check_in:  $check_in ,
                check_out: $check_out,
                type_name: $type_name
            },
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            success: function (result) {

                addData(result);

            },
            error: function(){
                alert('error');
            }
        });
    });

    $("#btnSearch").click(function() {

        $res_id = $('#txtResId').val();
        $check_in = $('#txtCheckIn').val();
        $check_out = $('#txtCheckOut').val();
        $type_name = $('#txtRoomType').val();
        jQuery("#jqGrid").jqGrid("clearGridData");
        jQuery("#jqGrid")[0].refreshIndex();
        jQuery("#jqGrid").trigger("reloadGrid");
        searchData($res_id,$check_in,$check_out,$type_name);
    });
});
