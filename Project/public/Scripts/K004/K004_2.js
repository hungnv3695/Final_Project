/**
 * Created by Nguyen Viet Hung on 6/29/2017.
 */
$(document).ready(function () {

    //JqGrid START
    $("#jqGrid").jqGrid({
        //url:'K004_1/K004_2/GetRoomFree',
        dataType: "json",
        mtype: "GET",
        styleUI : 'Bootstrap',
        colNames:['No.Room',
            'Room type',
            'Price',

        ],
        colModel: [
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

        loadComplete: function(){
            //set color for even row
            $("tr.jqgrow:even").css("background", "#DDDDDC");
            $('#jqGrid').jqGrid('setGridParam', { postData: { result: "" }});
        }

    });
    //Jqgrid END

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
    $( "#editBtn1" ).click(function() {
        //alert('fd');
        //jQuery("#jqGrid").setGridParam({data: jList });
        //jQuery("#jqGrid")[0].refreshIndex();
        //jQuery("#jqGrid").trigger("reloadGrid");
        $check_in = $('#checkin').val();
        $check_out = $('#checkout').val();
        $type_name = $('#double1txt').val();
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
                console.log(result);

            },
            error: function(){
                alert('error');
            }
        });
    });

});

