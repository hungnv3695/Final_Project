/**
 * Created by Nguyen Viet Hung on 6/29/2017.
 */
$(document).ready(function () {
    $.ajax({

        url: 'K003/GetStatus',
        method: 'GET',
        cache: false,
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        success: function (result) {
            $("#cboStatus").empty();
            $("#cboStatus").append($('<option></option>').val("").html(""));
            console.log(result);
            for (i=0; i < result.length; i++){
                //add data for status combobox
                $("#cboStatus").append($('<option></option>').val(result[i].id).html(result[i].status));
            }
        },
        error: function(){
            console.log( $('#txtFName').val());
            alert('error');
        }

    });

    $("#jqGrid").jqGrid({
        datatype: "local",
        mtype: "GET",

        styleUI : 'Bootstrap',
        colNames:['Reservation ID',
            'Customer Name',
            'Identity Card',
            'Check-in',
            'Check-out',
            'Quantity room',
            'Email',
            'Company',
            'Phone',
            'Status',
            'Paid Status'
        ],
        colModel: [
            { name: 'item0',  width: 75 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item1',  width: 150, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item2',  width: 150, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item3',  width: 150, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item4',  width: 150, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item5',  width: 150, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item6',  width: 150, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item7',  width: 150, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item8',  width: 150, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item9',  width: 150, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item9',  width: 150, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }}
        ],
        rownumbers: true,
        viewrecords: true,
        height: 400,
        rowNum: 10,
        pager: "#jqGridPager",
        autowidth: true,
        autoheight: true,
        loadonce: true,
        resizable: true,
        forceFit: true,
        shrinkToFit: false,


        ondblClickRow: function(rowId) {
            var rowData = jQuery(this).getRowData(rowId);
            var OrderID = rowData['CustomerID'];

            var aQryStr = "OrderID= " + OrderID ;

            window.open('K003', '_blank');

        },
        loadComplete: function(){

        }
    });
    //jQuery("#jqGrid").jqGrid('filterToolbar',{autosearch : false});
    var jList = [];
    //$('#jqGrid').jqGrid('setGridWidth', '50');

    function addData(result){

        for(var i = 0; i< result.length; i++){
            var x ={
                item0: result[i].res_id, item1: result[i].fullname, item2: result[i].identity_card,
                item3: result[i].checkin, item4: result[i].checkout, item5: result[i].quantity, item6: result[i].email,
                item7: result[i].company,item8: result[i].phone, item9: result[i].status, item9: result[i].paid_status
            };
            jList.push(x);
        }
        jQuery("#jqGrid").setGridParam({data: jList });
        jQuery("#jqGrid")[0].refreshIndex();
        jQuery("#jqGrid").trigger("reloadGrid");
    }

    function searchData($fullname,$idcard,$status) {
        jList = [];
        $.ajax({

            url: 'K003/searchReservation',
            method: 'GET',
            cache: false,
            data:{
                fname: $fullname,
                idCard: $idcard,
                status: $status
            },
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            success: function (response) {
                console.log(response);
                addData($.parseJSON(response));
                //addDataTable(guest);
            },
            error: function(){
                console.log( $('#txtFName').val());
                alert('error');
            }

        });
    }
    $("#btnSearch").click(function(){
        $fullname = $('#txtFName').val()
        $idcard = $('#txtIdCard').val()
        $status = $('#cboStatus').val();
        //console.log($fullname,$idcard,$status);
        jQuery("#jqGrid").jqGrid("clearGridData");
        jQuery("#jqGrid")[0].refreshIndex();
        jQuery("#jqGrid").trigger("reloadGrid");
        searchData($fullname,$idcard,$status);
    });

    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
});



