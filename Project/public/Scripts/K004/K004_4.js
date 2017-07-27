/**
 * Created by Nguyen Viet Hung on 7/24/2017.
 */
$(document).ready(function () {

    var room_num = 0; // Số phòng lấy ra từ txtNumroom
    var cList = [];//checked list
    var jqgrid = $("#jqGrid");// jqgrid các phòng còn trống
    var nuoftype = 0;//số kiểu phòng lấy ra từ database
    var noroom = 0;//số lượng phòng đã chọn
    var price  = 0;//Giá tiền
    var total_price = 0//Tổng tiền

    //START: Set datetimepicker
    jQuery('#txtCheckin').datetimepicker({
        format:'d/m/Y',
        onShow:function( ct ){
            this.setOptions({
                minDate:0?0:true,
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
        timepicker:false
    });
    $.datetimepicker.setLocale('vi');
    //END Datetimepicker
    function addtextbox(result, i) {
        if(i == 0) {
            $('#infor').append('<div class="form-inline" style="margin:10px 0px 0px 100px">'+
                '<label class="label1">Kiểu phòng</label>' +
                '<label class="label1">Số lượng</label>' +
                '<label class="label1">Giá</label>'+
                '</div>'
            );
            $('#infor').append('<div id ="'+ i + '" ' + 'class="form-inline" style="margin:10px 0px 0px 100px">'
                +'<input id=' + '"roomtype' + i + '" ' + 'class="form-control input-md" value="' + result[i].type_name + '" size="8" readonly>'
                +'<input id=' + '"noroom'+ i + '" ' +  'class="form-control input-md"  type="number" value="0" style="width: 50px;"  size="8" readonly> '
                +'<input id=' + '"price' + i +'" ' + 'class="form-control input-md"  value="0" style="width: 150px;text-align: right;"  size="8" readonly>'
                +'</div>')
        }
        else {
            $('#infor').append('<div id ="'+ i + '" ' + 'class="form-inline" style="margin:0px 0px 0px 100px">'
                +'<input id=' + '"roomtype' + i + '" ' + 'class="form-control input-md" value="' + result[i].type_name + '" size="8" readonly>'
                +'<input id=' + '"noroom'+ i + '" ' +  'class="form-control input-md"  type="number" value="0" style="width: 50px;"  size="8" readonly> '
                +'<input id=' + '"price' + i +'" ' + 'class="form-control input-md"  value="0" style="width: 150px;text-align: right;"  size="8" readonly>'
                +'</div>')
        }

    }
    //START: LOAD: Roomtype combobox


    function loadStatus() {
        $.ajax({

            url: 'K004_4/GetRoomType',
            method: 'GET',
            cache: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            success: function (result) {
                nuoftype = result.length;
                $("#gs_item3").empty();
                $("#gs_item3").append($('<option></option>').val("").html(""));
                for (i=0; i < result.length; i++){
                    //add data for status combobox
                    if(result[i].status_id == status){
                        $("#gs_item3").append($('<option selected></option>').val(result[i].type_name).html(result[i].type_name));
                    }
                    else{
                        $("#gs_item3").append($('<option></option>').val(result[i].type_name).html(result[i].type_name));
                        addtextbox(result,i);
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
    //START: JQGRID : load room free
    $("#jqGrid").jqGrid({
        datatype: "local",
        mtype: "GET",

        styleUI : 'Bootstrap',
        colNames:[
            '*',
            'Số phòng',
            ' ',
            'Kiểu phòng',
            ' '

        ],
        colModel: [
            { name: 'item0', search : false, width: 40 , align: "left", sorttype: "text", sortable: false, formatter: function (cellvalue, options) {
                return addCheckbox(options.rowId);
            }},
            { name: 'item1',search : false,  width: 90 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item2', hidden: true },
            { name: 'item3',index:'item3',value:'item3', width: 140, align: "left",formatter: 'text', stype: 'select' ,sorttype: "text", sortable: true, searchoptions: { value: {"0": "" }}},
            { name: 'item4', hidden: true }
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
            var count_checked = cList.length;

            var ch = jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked');
            if(ch) {
                jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked',false);
                removecheckedlist();
                deleteToRoomType(id, nuoftype);
                return;
            }

            if(count_checked > room_num){
                return;
            }else if(count_checked == room_num){
                var ch =  jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked',false);
                removecheckedlist();
                if(ch) {
                    jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked',false);
                    removecheckedlist();
                    //deleteToRoomType(id, nuoftype);
                    return;
                }else {
                    deleteToRoomType(id, nuoftype);
                }

            }else if(count_checked < room_num){
                if(ch) {
                    jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked',false);
                    removecheckedlist();
                    deleteToRoomType(id, nuoftype)
                } else {
                    jQuery(this).find('#'+id+' input[type=checkbox]').prop('checked',true);
                    //roList.push(celValue);
                    addcheckedtolist();
                    addToRoomType(id, nuoftype);
                }

            }
            console.log(cList);
        },

        loadComplete: function(){
            $("tr.jqgrow:even").css("background", "#F5F5F5");
            $("tr.jqgrow:odd").css("background", "#EEE8AA");
            //checkroom($res_id);
            jQuery("#jqGrid").jqGrid('filterToolbar','autosearch');
            // var sgrid = $("#jqGrid")[0];
            // sgrid.triggerToolbar();
            var  count=jqgrid.jqGrid('getGridParam', 'records');
            var celValue = "";
            for (var i=1; i <= count; i++){
                celValue = jqgrid.jqGrid ('getCell', i, 'item2');
                for(var j = 0; j < cList.length; j++){
                    if(celValue == cList[j] ){
                        jQuery(this).find('#'+i+' input[type=checkbox]').prop('checked',true);
                    }
                }
            }
        },


    });
    $( ".ui-th-div" ).append( "<p>No.</p>" );
    $(".clearsearchclass").hide();

    function addCheckbox(id) {
        return "<input type='checkbox' id='"+ id + "' disabled='disabled'>" ;
    }
    //room number + 1
    function addToRoomType(id, nuoftype){
        var type_name = jqgrid.jqGrid ('getCell', id, 'item3');
        var ro_price = Number(jqgrid.jqGrid ('getCell', id, 'item4'));
        var tname = "";
        var no_room = Number($('#txtNumpeople').val());
        total_price = Number($("#txtTotalprice").val());
        for(var i = 0; i < nuoftype; i++){
            noroom = Number($("#noroom" + i).val());
            price = Number($("#price" + i).val());
            tname = $("#roomtype" + i).val();
            if (type_name == tname ){
                    $("#noroom" + i).val(noroom+1);
                    $("#price" + i).val(price + ro_price);
                    $("#txtTotalprice").val(total_price +  ro_price );
            }

        }

    }

    //room number - 1
    function deleteToRoomType(id, nuoftype){
        var type_name = jqgrid.jqGrid ('getCell', id, 'item3');
        var ro_price = Number(jqgrid.jqGrid ('getCell', id, 'item4'));
        var tname = "";
        var no_room = Number($('#txtNumpeople').val());
        total_price = Number($("#txtTotalprice").val());
        for(var i = 0; i < nuoftype; i++){
            noroom = Number($("#noroom" + i).val());
            price = Number($("#price" + i).val());
            tname = $("#roomtype" + i).val();
            if (type_name == tname ){
                $("#noroom" + i).val(noroom - 1);
                $("#price" + i).val(price - ro_price);
                $("#txtTotalprice").val(total_price -  ro_price );
            }
        }
    }

    //remove room out to checked list
    function  removecheckedlist() {
        selRowId = jqgrid.jqGrid ('getGridParam', 'selrow');
        celValue = jqgrid.jqGrid ('getCell', selRowId, 'item2');
        for(var i = 0; i<cList.length; i++){
            if(cList[i] == celValue){
                cList.splice(i, 1);
            }
        }
    }

    //add to checked list
    function addcheckedtolist(){
        selRowId = jqgrid.jqGrid ('getGridParam', 'selrow');
        celValue = jqgrid.jqGrid ('getCell', selRowId, 'item2');
        //cList.push(celValue);
        for(var i = 0; i<cList.length; i++){
            if(cList[i] == celValue){
                return;
            }
        }
        cList.push(celValue);
    }
    //END: JQGRID : load room free



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
        console.log(result);
        for(var i = 0; i< result.length; i++){
            var x ={
                item1: result[i].room_number,
                item2: result[i].room_id,
                item3: result[i].type_name,
                item4: result[i].price
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
    $('#btnSave').click(function(event){

        event.preventDefault();

        $.ajax({
            url: '/K004_4/insertResInfor',
            method: 'GET',
            cache: false,
            dataType: 'json',
            data: $("input").serialize(),



            contentType: 'application/json; charset=utf-8',
            success: function (result) {
                addData(result);
            },
            error: function(){
                alert('error');
            }
        });
        e.preventDefault();

    });


});