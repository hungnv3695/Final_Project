/**
 * Created by Nguyen Viet Hung on 7/24/2017.
 */
$(document).ready(function () {
    var room_num = 0;

    //START: Set datetimepicker
    $( "#txtCheckin" ).datetimepicker({

        format:'d/m/Y',
        timepicker:false,
        onShow:function( ct ){
            this.setOptions({
                minDate:0?0:true,
                maxDate:jQuery('#txtCheckout').val()?jQuery('#txtCheckout').val():false
            })
        },
    });
    $( "#txtCheckout" ).datetimepicker({
        format:'d/m/Y',
        timepicker:false,
        onShow:function( ct ){
            this.setOptions({
                minDate:jQuery('#txtCheckin').val()?jQuery('#txtCheckin').val():false
            })
        },
    });
    $.datetimepicker.setLocale('vi');
    //END Datetimepicker


    //START: JQGRID : load room free
    $("#jqGrid").jqGrid({
        datatype: "local",
        mtype: "GET",

        styleUI : 'Bootstrap',
        colNames:[
            '*',
            'Số phòng',
            ' ',
            'Kiểu phòng'
        ],
        colModel: [
            { name: 'item0', search : false, width: 40 , align: "left", sorttype: "text", sortable: false, formatter: function (cellvalue, options) {
                return addCheckbox(options.rowId);
            }},
            { name: 'item1',search : false,  width: 90 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item2', hidden: true, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item3',index:'item3',value:'item3', width: 140, align: "left",formatter: 'text', stype: 'select' ,sorttype: "text", sortable: true, searchoptions: { value: {"0": "" }}}
        ],
        rownumbers: true,
        height: 200,
        width: 310,
        rowNum: 10,
        autoheight: true,
        loadonce: true,
        resizable: true,
        forceFit: true,
        shrinkToFit: false,


        onSelectRow: function(id,status){
            room_num = $('#txtNumroom').val();
            var count_checked = jQuery("#jqGrid").find('input[type=checkbox]:checked').length;

            var ch =  jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked');
            if(ch) {
                jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked',false);
            } else {
                jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked',true);
                selRowId = $('#jqGrid').jqGrid ('getGridParam', 'selrow');
                celValue = $('#jqGrid').jqGrid ('getCell', selRowId, 'item2');
                //roList.push(celValue);
            }
            if(count_checked > room_num){
                return;
            }else if(count_checked == room_num){

                var ch =  jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked',false);
                if(ch) {
                    jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked',false);
                }
            }
        },
        loadComplete: function(){
            $("tr.jqgrow:even").css("background", "#DDDDDC");
            //checkroom($res_id);
            jQuery("#jqGrid").jqGrid('filterToolbar','autosearch');
            // var sgrid = $("#jqGrid")[0];
            // sgrid.triggerToolbar();

        },


    });
    $( ".ui-th-div" ).append( "<p>No.</p>" );
    //$(".ui-search-input").attr("hidden","hidden");
    // $("#gs_item3")
    //     .append($('<option></option>').val('Single room').html('Single room'));

    function addCheckbox(id) {
        return "<input type='checkbox' id='"+ id + "' disabled='disabled'>" ;
    }
    //END: JQGRID : load room free


    //START: LOAD: Roomtype combobox
    function loadStatus() {
        $.ajax({

            url: 'K004_4/GetRoomType',
            method: 'GET',
            cache: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            success: function (result) {
                $("#gs_item3").empty();
                $("#gs_item3").append($('<option></option>').val("").html(""));
                for (i=0; i < result.length; i++){
                    //add data for status combobox
                    if(result[i].status_id == status){
                        $("#gs_item3").append($('<option selected></option>').val(result[i].type_name).html(result[i].type_name));
                    }
                    else{
                        $("#gs_item3").append($('<option></option>').val(result[i].type_name).html(result[i].type_name));
                    }

                }
            },
            error: function(){
                alert('error');
            }

        });

    }
    loadStatus();
    //END: LOAD: Roomtype combobox
    function  checkroom(check_in, check_out) {

            $.ajax({
                url: 'K004_4/SearchRoomFree',
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
                },
                error: function(){
                    alert('error');
                }
            });
            event.preventDefault();


    }
    function addData(result){
        var jList=[];
        for(var i = 0; i< result.length; i++){
            var x ={
                item1: result[i].room_number,
                item2: result[i].room_id,
                item3: result[i].type_name
            };
            jList.push(x);
        }
        console.log(jList);
        jQuery("#jqGrid").setGridParam({data: jList });
        jQuery("#jqGrid")[0].refreshIndex();
        jQuery("#jqGrid").trigger("reloadGrid");
    }

    $('#btnSearch').click(function(e){
        var check_in = $('#txtCheckin').val();
        var check_out = $('#txtCheckout').val();
        if(check_in == "" || check_out==""){
            alert('Nhập ngày check-in, check out trước khi search');
            e.preventDefault();
            return;
        }
        jQuery("#jqGrid").jqGrid("clearGridData");
        jQuery("#jqGrid")[0].refreshIndex();
        jQuery("#jqGrid").trigger("reloadGrid");
        e.preventDefault();
        checkroom(check_in,check_out);
    });

    $('#cboRoomtype').change(function () {

        jQuery("#jqGrid").trigger("reloadGrid");
    });


});