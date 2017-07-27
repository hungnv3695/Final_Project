/**
 * Created by Nguyen Viet Hung on 6/29/2017.
 */
$(document).ready(function () {
    var res_id = $('#res_id').val();
    var check_in = $('#checkintxt').val();
    var check_out = $('#checkouttxt').val();

    //Start: HungNV : Update reservation status -> Processing
    $.ajax({
        url: 'K004_1/K004_2/ChangeSttToProcessing',
        method: 'GET',
        cache: false,
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        success: function (result) {

        },
        error: function(){
            alert('error');
        }

    });
    //End: Update reservation status -> Processing

    //JqGrid START
    $("#jqGrid").jqGrid({
        datatype: "local",
        mtype: "GET",

        styleUI : 'Bootstrap',
        colNames:['Kiểu phòng',
            'Số lượng',
            'Giá',
            'Phòng',


        ],
        colModel: [
            { name: 'item0',  width: 130 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item1',  width: 70, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item2',  width: 100, align: "left", formatter:'currency', formatoptions:{decimalSeparator:".", thousandsSeparator: ",", decimalPlaces: 2}},
            { name: 'item3',  width: 170, align: "right", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }}

        ],
        rownumbers: true,
        height: 145,
        rowNum: 10,
        //pager: "#jqGridPager",
        autowidth: true,
        autoheight: true,
        loadonce: true,
        resizable: true,
        forceFit: true,
        shrinkToFit: false,
        footerrow: true,
        userDataOnFooter: true,
        altRows : true,
        //gridview: true,


        ondblClickRow: function(rowId) {
            var rowData = jQuery(this).getRowData(rowId);
            var type_name = rowData['item0'];
            var no_room = rowData['item1'];
            window.open('/K004_1/K004_2/K004_3?res_id=' + res_id + '&type_name=' + type_name + '&no_room=' + no_room
                +"&check_in=" + check_in + "&check_out=" + check_out
                , '_self');

        },
        loadComplete: function(){
            //set color for even row
            $("tr.jqgrow:even").css("background", "#DDDDDC");
            $(".jqGrid_item1").append("<p>Total: </p>")
            var $grid = $('#jqGrid');
            var colSum = $grid.jqGrid('getCol', 'item2', false, 'sum');
            $grid.jqGrid('footerData', 'set', { 'item2' : colSum });
            $grid.jqGrid('footerData', 'set', { 'item1' : "Total:" });

        }

    });


    $( ".ui-th-div" ).append("<p>No</p>");
    //Jqgrid END

    var res_id = $('#res_id').val();
    searchData(res_id);
    loadStatus();
    function loadStatus() {
        var status = $('#status').val();
        $.ajax({

            url: 'GetStatus',
            method: 'GET',
            cache: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            success: function (result) {
                $("#cboStatus").empty();
                $("#cboStatus").append($('<option></option>').val("").html(""));
                for (i=0; i < result.length; i++){
                    //add data for status combobox
                    if(result[i].status_id == status){
                        $("#cboStatus").append($('<option selected></option>').val(result[i].status_id).html(result[i].status_name));
                    }
                    else{
                        $("#cboStatus").append($('<option></option>').val(result[i].status_id).html(result[i].status_name));
                    }

                }
            },
            error: function(){
                alert('error');
            }

        });

    }
    function  searchData(res_id) {


        jQuery("#jqGrid").jqGrid("clearGridData");
        jQuery("#jqGrid")[0].refreshIndex();
        jQuery("#jqGrid").trigger("reloadGrid");
        var total = 0;
        $.ajax({
            url: '/K004_1/K004_2/LoadBookedRoom',
            method: 'GET',
            cache: false,
            data:{
                res_id: res_id
            },
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            success: function (result) {
                addData(result);
            },
            error: function(){
                alert('Update Error');
            }
        });
    }
    function addData(result){
        var jList=[];
        for(var i = 0; i< result.length; i++){
            var x ={
                item0: result[i].type_name,
                item1: result[i].count,
                item2: result[i].price,
                item3: result[i].list_room


            };
            jList.push(x);
        }
        console.log(jList);
        jQuery("#jqGrid").setGridParam({data: jList });
        jQuery("#jqGrid")[0].refreshIndex();
        jQuery("#jqGrid").trigger("reloadGrid");
    }

    $("#btnSave").click(function () {
        //Guest Information
        var guest_id  = $('#guest_id').val();
        var fullname  = $("#fullnametxt").val();
        var address   = $("#addresstxt").val();
        var idcard    = $("#idcardtxt").val();
        var country   = $("#countrytxt").val();
        var phonetxt  = $("#phonetxt").val();
        var company   = $("#companytxt").val();
        var email     = $("#emailtxt").val();
        //Reservation Information
        var res_id      = $("#res_id").val();
        var check_in    = $("#checkintxt").val();
        var check_out   = $("#checkouttxt").val();
        var numpeople   = $("#numofpeopletxt").val();
        var noroom      = $("#noroomtxt").val();
        var status      = $("#cboStatus").val();



        console.log(numpeople);
        $.ajax({
            url: '/K004_1/K004_2/UpdateReservation',
            method: 'GET',
            cache: false,
            data:{
                guest_id: guest_id,
                fullname: fullname,
                address: address ,
                idcard: idcard  ,
                country: country ,
                phonetxt: phonetxt,
                company: company ,
                email: email,

                res_id   : res_id,
                check_in : check_in  ,
                check_out: check_out ,
                numpeople: numpeople ,
                noroom   : noroom    ,
                status   : status

            },
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            success: function (result) {
                if(result == '1'){
                    alert('Update Successfully');
                }else {
                    alert(result);
                }

            },
            error: function(){
                alert('Update Error');
            }
        });
    });

    $( "#btnBack" ).click(function(){
        window.open('/K004_1','_self')

    });
});

