/**
 * Created by Nguyen Viet Hung on 6/29/2017.
 */
$(document).ready(function () {

    var count=jQuery("#jqGrid").jqGrid('getGridParam', 'records');
    //JqGrid START
    $("#jqGrid").jqGrid({
        //url:'K004_1/K004_2/GetRoomFree',
        datatype: "local",
        mtype: "GET",
        styleUI : 'Bootstrap',
        colNames:[
            '',
            'No.room',
            'Room type',
            'Price'

        ],
        colModel: [
            { name: 'item0',  width: 50 , align: "left", sorttype: "text", sortable: false, formatter: function (cellvalue, options) {
                return addCheckbox(options.rowId);
            }},
            { name: 'item0',  width: 120 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item1',  width: 120, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item2',  width: 120, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }}

        ],
        rownumbers: true,
        height: 150,
        rowNum: 10,
        pager: "#jqGridPager",
        autowidth: true,
        autoheight: true,
        loadonce: true,
        resizable: true,
        forceFit: true,
        shrinkToFit: false,
        ignoreCase: true,
        loadComplete: function(){
            //set color for even row
            $("tr.jqgrow:even").css("background", "#DDDDDC");
            //$('#jqGrid').jqGrid('setGridParam', { postData: { result: "" }});

        },

        onSelectRow: function(id,status){
            var count_checked = jQuery("#jqGrid").find('input[type=checkbox]:checked').length;

            var ch =  jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked');
            if(ch) {
                jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked',false);
            } else {
                jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked',true);
            }
            if(count_checked > 2){
                return;
            }else if(count_checked == 2){

                var ch =  jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked',false);
                if(ch) {
                    jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked',false);
                }
            }

            selRowId = $('#jqGrid').jqGrid ('getGridParam', 'selrow');
            celValue = $('#jqGrid').jqGrid ('getCell', selRowId, 'item2');
        }

    });

    $( ".ui-th-div" ).append( "<p>No.</p>" );
    //Jqgrid END
    function addCheckbox(id) {
        return "<input type='checkbox' id='"+ id + "' disabled='disabled'>" ;
    }
    //Display number of room START
    $number_of_room = $('#number_of_room').val();
    console.log($number_of_room);
    display_room();
    function display_room() {
            switch($number_of_room) {
                case "1":
                    $("#room2").css("display", "none");
                    $("#room3").css("display", "none");
                    $("#room4").css("display", "none");
                    break;
                case "2":
                    $("#room3").css("display", "none");
                    $("#room4").css("display", "none");
                    break;
                case "3":
                    $("#room4").css("display", "none");
                    break;
                default:
                    break;
            }
    }
    //Display number of room END
    //$('#id').val('')
    function  searchData(check_in,check_out,type_name) {

        console.log($check_in,$check_out,$type_name);
        $.ajax({
            url: 'GetRoomFree',
            method: 'GET',
            cache: false,
            data:{
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
    $( "#editBtn1" ).click(function() {
        //jQuery("#jqGrid").jqGrid("clearGridData");
        $check_in = $('#checkin').val();
        $check_out = $('#checkout').val();
        $type_name = $('#double1txt').val();
        jQuery("#jqGrid").jqGrid("clearGridData");
        jQuery("#jqGrid")[0].refreshIndex();
        jQuery("#jqGrid").trigger("reloadGrid");
        searchData($check_in,$check_out,$type_name);

    });

    function addData(result){
        var jList=[];
        for(var i = 0; i< result.length; i++){
            var x ={
                item0: result[i].room_number,
                item1: result[i].type_name,
                item2: result[i].price

            };
            jList.push(x);
        }
        console.log(jList);
        jQuery("#jqGrid").setGridParam({data: jList });
        jQuery("#jqGrid")[0].refreshIndex();
        jQuery("#jqGrid").trigger("reloadGrid");
    }

    $( "#closeBtn" ).click(function(){
       close();

    });
});

