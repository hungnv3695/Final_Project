/**
 * Created by Nguyen Viet Hung on 7/12/2017.
 */
$(document).ready(function () {

    $('#btnSave').attr("disabled", true);
    var roList = [];
    var cellStatus_id = "";
    var room_number = $('#txtRoomNo').val();
    $res_id = $('#txtResId').val();
    var detail_id=[];
    var checkin= $('#txtCheckIn').val();

    var checkout = $('#txtCheckOut').val();

    var d = new Date();

    var month = d.getMonth()+1;
    var day = d.getDate();

    var dateNow = d.getFullYear() + '' +
        ((''+month).length<2 ? '0' : '') + month + '' +
        ((''+day).length<2 ? '0' : '') + day;


    $("#jqGrid").jqGrid({
        datatype: "local",
        mtype: "GET",

        styleUI : 'Bootstrap',
        colNames:[
            '*',
            'No.Room',
            ' ',
            ' ',
            ' '
        ],
        colModel: [
            { name: 'item0',  width: 40 , align: "left", sorttype: "text", sortable: false, formatter: function (cellvalue, options) {
                return addCheckbox(options.rowId);
            }},
            { name: 'item1',  width: 135 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item2', hidden: true, width: 130 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item3', id:'item3', width: 80 , align: "left"
                ,formatter: function (cellvalue, options){return addLink(options.rowId);}

             },
            {name:'item4', hidden: true}
            ],
        rownumbers: true,
        height: 210,
        width: 300,
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
            if(count_checked > room_number){
                return;
            }else if(count_checked == room_number){

                var ch =  jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked',false);
                if(ch) {
                    jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked',false);
                }
            }
        },
        loadComplete: function(){
            $("tr.jqgrow:even").css("background", "#F5F5F5");
            $("tr.jqgrow:odd").css("background", "#EEE8AA");
            checkroom($res_id);

            //hiddenCheckin();
        },
        beforeSelectRow: function(rowid, e) {

        },


    });
    //Add Link for event Delete Rows
    function addLink(id) {
            return "<a href='#' id='checkin" + id + "' style='display: none'  type='button' \></a>";
    }
    // function changeLink(cellvalue, options, cell) {
    //     return "<a href='#' id='checkout" + options.rowId + "' style='display: none' type='button' title='Check-out' \></a>";
    // }

    $( ".ui-th-div" ).append( "<p>No.</p>" );

    function addCheckbox(id) {
        return "<input type='checkbox' id='"+ id + "' disabled='disabled'>" ;
    }
    
    // function hiddenCheckin() {
    //     var count=jQuery("#jqGrid").jqGrid('getGridParam', 'records');
    //
    //     for(var i =1 ; i<= count; i++){
    //         var ch =  $('input[id='+i+']').prop('checked');
    //         if(!ch){
    //             $("#checkin" + i).css('display','none');
    //         }
    //     }
    // }

    function  searchData(res_id,check_in,check_out,type_name) {


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
                item2: result[i].room_id,
                item4: result[i].status_id
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
                detail_id=[];
                var count=jQuery("#jqGrid").jqGrid('getGridParam', 'records');
                for(var j = 0; j< count; j++){
                var celValue = $('#jqGrid').jqGrid ('getCell', j+1 , 'item2');
                    for(var i = 0; i < result.length; i++){
                            if(celValue == result[i].room_id){
                                detail_id.push(result[i].id);
                                var a = j + 1;
                                jQuery("#jqGrid").find('#'+ a +' input[type=checkbox]').prop('checked',true);
                                if(checkin<=dateNow<=checkout){
                                    cellStatus_id = $('#jqGrid').jqGrid ('getCell', a , 'item4');
                                    var roomId = $('#jqGrid').jqGrid ('getCell', a , 'item2');
                                    if(cellStatus_id == "RO02"){
                                        // $("#checkin" + a).removeAttr( "onclick" );
                                        // $("#checkin" + a).removeAttr( "title" );

                                        $("#checkin" + a).css("display","true");
                                        $("#checkin" + a).wrapInner('Check-out');
                                        //$("#checkin" + a).attr('value','1');
                                        $("#checkin" + a).attr('onclick', 'window.open(\'/K003_2?res_id='+ $res_id+ '&room_id='+roomId +'\')' );

                                    }else{
                                        // $("#checkin" + a).removeAttr( "onclick" );
                                        // $("#checkin" + a).removeAttr( "title" );
                                        $("#checkin" + a).css("display","true");
                                        $("#checkin" + a).wrapInner('Check-in');
                                        //$("#checkin" + a).attr('value','1');
                                        $("#checkin" + a).attr('onclick', 'window.open(\'/K003_2?res_id='+ $res_id+ '&room_id='+roomId +'\')' );

                                    }



                                }

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

    $("#btnSave").click(function() {
        var count=jQuery("#jqGrid").jqGrid('getGridParam', 'records');
        var checkroom = 0;
        var celValue= [];

        for(var i = 1; i<=count; i++){

            if(jQuery("#jqGrid").find('#'+ i +' input[type=checkbox]').is(':checked')){
                celValue.push($('#jqGrid').jqGrid ('getCell', i , 'item2'));
                checkroom = checkroom + 1;
            }
        }
        if(checkroom == 0 ){
            alert('You need choose room for reservation')
            return;
        }
        else if(checkroom < room_number  ){
            alert('You need choose ' + room_number + ' room for reservation')
            return;
        }
        else {
            $.ajax({
                url: '/K004_1/K004_2/K004_3/SaveRoom',
                method: 'GET',
                cache: false,
                data:{
                    res_id: $res_id,
                    detail_id: detail_id,
                    room_id: celValue

                },
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function (result) {
                    if(result == detail_id.length){
                        alert('Update Successfuly');
                    }
                    else {
                        alert('Update Failed');
                    };
                    window.open('/K004_1/K004_2?res_id=' + $res_id, "_self");

                },
                error: function(){
                    alert('Update Error');
                }
            });
        }


    });

    $("#btnBack").click(function () {
        window.open('/K004_1/K004_2?res_id=' + $res_id, "_self");
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
        $('#btnSave').attr("disabled", false);

    });
});
