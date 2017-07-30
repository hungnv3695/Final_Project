/**
 * Created by Nguyen Viet Hung on 6/29/2017.
 */
$(document).ready(function () {
    $.ajax({

        url: 'K004_1/GetStatus',
        method: 'GET',
        cache: false,
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        success: function (result) {
            $("#cboStatus").empty();
            $("#cboStatus").append($('<option></option>').val("").html(""));
            for (i=0; i < result.length; i++){
                //add data for status combobox
                $("#cboStatus").append($('<option></option>').val(result[i].status_id).html(result[i].status_name));
            }
        },
        error: function(){
            alert('error');
        }

    });

    $("#jqGrid").jqGrid({
        datatype: "local",
        mtype: "GET",

        styleUI : 'Bootstrap',
        colNames:['Id',
            'Khách hàng',
            'CMND',
            'Check-in',
            'Check-out',
            'Số phòng',
            'E-mail',
            'Công ty',
            'Điện Thoại',
            'Trạng thái',
            'Paid status'
        ],
        colModel: [
            { name: 'item0', hidden: true,  width: 75 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item1',  width: 156, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item2',  width: 95, align: "right", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item3',  width: 95, align: "center", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item4',  width: 95, align: "center", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item5',  hidden: true, width: 70, align: "right", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item6',  width: 150, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item7',  hidden: true, width: 100, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item8',  width: 100, align: "right", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item9',  width: 120, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item10', hidden: true,  width: 150, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }}
        ],
        rownumbers: true,
        viewrecords: true,
        height: 372,
        rowNum: 10,
        pager: "#jqGridPager",
        autowidth: true,
        autoheight: true,
        loadonce: true,
        resizable: true,
        forceFit: true,
        shrinkToFit: false,
        ignoreCase: true,


        ondblClickRow: function(rowId) {
            var rowData = jQuery(this).getRowData(rowId);
            var res_id = rowData['item0'];
            window.open('K004_1/K004_2/?res_id=' + res_id , '_self');

        },
        loadComplete: function(){
            //set color for even row
            $("tr.jqgrow:even").css("background", "#F5F5F5");
            $("tr.jqgrow:odd").css("background", "#EEE8AA");
        }

    });
    $( ".ui-th-div" ).append( "<p>No.</p>" );
    //jQuery("#jqGrid").jqGrid('filterToolbar',{autosearch : false});
    var jList = [];
    function addData(result){
        console.log(result);
        for(var i = 0; i< result.length; i++){
            var x ={
                item0: result[i].id, item1: result[i].name, item2: result[i].identity_card,
                item3: result[i].check_in, item4: result[i].check_out, item5: result[i].number_of_room, item6: result[i].mail,
                item7: result[i].company,item8: result[i].phone, item9: result[i].status_name, item10: result[i].paid_status
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

            url: 'K004_1/SearchReservation',
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
                if(response.length == ""){
                    alert("No Data");
                }

                addData(response);
            },
            error: function(){

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



