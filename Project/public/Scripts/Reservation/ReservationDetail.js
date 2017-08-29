/**
 * Created by Nguyen Viet Hung on 6/29/2017.
 */
$(document).ready(function () {
    var res_id = $('#res_id').val();
    var check_in = $('#checkintxt').val();
    var check_out = $('#checkouttxt').val();
    var PROCESSING = "RS02";
    var PROCESSED = "RS03";
    var FINISH = "RS05";
    var CANCELLED = "RS04";
    var status = $('#status').val();

    function addCommas(nStr)
    {
        nStr += '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(nStr)) {
            nStr = nStr.replace(rgx, '$1' + '.' + '$2');
        }
        return nStr;
    }

    function removeCommas(nStr)
    {
        nStr+="";
        nStr = nStr.replace(".","");
        return nStr;
    }
    function GetUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };
    //Datetimepicker
    jQuery('#checkintxt').datetimepicker({
        format:'d/m/Y',
        onShow:function( ct ){
            this.setOptions({
                minDate:0,
                maxDate:0
            })
        },
        timepicker:false,

        onSelectDate: function (date) {
            //days();
        }
    });
    jQuery('#checkouttxt').datetimepicker({
        format:'d/m/Y',
        onShow:function( ct ){
            this.setOptions({
                minDate:jQuery('#checkintxt').val()?jQuery('#checkintxt').val():false
            })
        },
        timepicker:false,

        onSelectDate: function (date) {
            //days();
        }
    });
    $.datetimepicker.setLocale('vi');

    function days() {
        var a,b,c;

        if(($("#checkintxt").val()=="") || ($("#checkouttxt").val()=="")){
            return;
        }
        a = $("#checkintxt").datetimepicker('getValue').getTime(),
            b = $("#checkouttxt").datetimepicker('getValue').getTime(),
            c = 24*60*60*1000,
            diffDays = Math.round(Math.abs((a - b)/(c)));
        // d = ('20/10/2017').datetimepicker('getValue').getTime();
        // console.log(d);
        $("#txtNight").val(diffDays);
    }
    days();
    //End datetimepicker


    //Start: HungNV : Update reservation status -> Processing
    function checkStatus() {

        if(status != FINISH && status != CANCELLED){
            $.ajax({
                url: '/ReservationList/ReservationDetail/ChangeSttToProcessing',
                method: 'GET',
                cache: false,
                dataType: 'json',
                data: {
                    res_id: res_id,
                    status: PROCESSING
                },
                contentType: 'application/json; charset=utf-8',
                success: function (result) {
                    //loadStatus(result.status_id);
                },
                error: function(){
                    alert('error');
                }

            });
        }
        else {
            return;
        }



    }
    checkStatus();
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
            ' '


        ],
        colModel: [
            { name: 'item0',  width: 130 , align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item1',  width: 70, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item2',  width: 100, align: "left", formatter:'integer', formatoptions:{thousandsSeparator: "."}},
            { name: 'item3',  width: 170, align: "left", sorttype: "text", sortable: true, searchoptions: { sopt: ['eq', 'bw', 'bn', 'cn', 'nc', 'ew', 'en'] }},
            { name: 'item4' , hidden :true}

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
            var room_type_id = rowData['item4'];

                window.open('/ReservationList/ReservationDetail/ChangeBookedRoom?res_id=' + res_id + '&type_name=' + type_name + '&no_room=' + no_room
                    +"&check_in=" + check_in + "&check_out=" + check_out + "&room_type_id=" + room_type_id
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
            $grid.jqGrid('footerData', 'set', { 'item3' : "x " + $("#txtNight").val() + " đêm" } );
            var total = colSum * $("#txtNight").val();
            //total = (total + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
            $("#txtTotal").val(addCommas(total+(total*10/100)))


        }

    });


    $( ".ui-th-div" ).append("<p></p>");
    //Jqgrid END

    var res_id = $('#res_id').val();
    searchData(res_id);
    loadStatus(status);
    function loadStatus(status) {

        $.ajax({

            url: 'GetStatus',
            method: 'GET',
            cache: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            success: function (result) {
                $("#cboStatus").empty();
                $("#cboStatus").append($('<option></option>').val("").html(""));
                if(status==FINISH){
                    for (i=0; i < result.length; i++){
                        //add data for status combobox

                        if(result[i].status_id == FINISH){

                            $("#cboStatus").append($('<option selected></option>').val(result[i].status_id).html(result[i].status_name));
                            //$('#cboStatus').attr("disabled", true);
                        }
                        else if (result[i].status_id == PROCESSING){
                            $("#cboStatus").append($('<option></option>').val(result[i].status_id).html(result[i].status_name));

                        }

                    }
                }
                else if (status == CANCELLED){
                    for (i=0; i < result.length; i++){
                        //add data for status combobox

                        if(result[i].status_id == CANCELLED){

                            $("#cboStatus").append($('<option selected></option>').val(result[i].status_id).html(result[i].status_name));
                            //$('#cboStatus').attr("disabled", true);
                        }
                        else if (result[i].status_id == PROCESSING){
                            $("#cboStatus").append($('<option></option>').val(result[i].status_id).html(result[i].status_name));

                        }

                    }
                }
                else if (status==PROCESSING) {
                    for (i=0; i < result.length; i++){
                        //add data for status combobox

                        if(result[i].status_id == PROCESSING){
                            $("#cboStatus").append($('<option selected></option>').val(result[i].status_id).html(result[i].status_name));
                        }
                        else {
                            $("#cboStatus").append($('<option></option>').val(result[i].status_id).html(result[i].status_name));
                        }

                    }
                }
                else {
                    for (i=0; i < result.length; i++){
                        //add data for status combobox

                        if(result[i].status_id == PROCESSING){
                            $("#cboStatus").append($('<option selected></option>').val(result[i].status_id).html(result[i].status_name));
                        }
                        else {
                            $("#cboStatus").append($('<option></option>').val(result[i].status_id).html(result[i].status_name));
                        }

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
            url: '/ReservationList/ReservationDetail/LoadBookedRoom',
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
                alert('Cập nhập lỗi');
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
                item3: result[i].list_room,
                item4: result[i].room_type_id


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
            url: '/ReservationList/ReservationDetail/UpdateReservation',
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
                    alert('Lưu thay đổi thành công');
                }else if(result == '0') {
                    alert('Xảy ra lỗi khi lưu thay đổi');
                }

            },
            error: function(){
                alert('Cập nhật lỗi');
            }
        });
    });

    $( "#btnBack" ).click(function(){
        window.open('/ReservationList','_self')

    });
});

