<meta name="_token" content="{!! csrf_token() !!}"/>
<html lang="en">

<head>
	<!-- The jQuery library is a prerequisite for all jqSuite products -->
	<script type="text/ecmascript" src="{{asset('jqgrid/js/jquery-1.11.0.min.js') }}"></script>
<!--<script type="text/ecmascript" src="{{asset('jqgrid/js/jquery-3.2.1.min.js') }}"></script>-->
	<!-- We support more than 40 localizations -->
	<script type="text/ecmascript" src="{{asset('jqgrid/js/i18n/grid.locale-en.js') }}"></script>
	<!-- This is the Javascript file of jqGrid -->
	<script type="text/ecmascript" src="{{asset('jqgrid/js/jquery.jqGrid.min.js')}}"></script>
	<!-- This is the localization file of the grid controlling messages, labels, etc.
    <!-- A link to a jQuery UI ThemeRoller theme, more than 22 built-in and many more custom -->
	<link rel="stylesheet" type="text/css" media="screen" href="{{asset('bootstrap-3.3.4-dist/css/bootstrap.min.css')}}" />
	<!-- The link to the CSS that the grid needs -->
	<link rel="stylesheet" type="text/css" media="screen" href="{{asset('jqgrid/css/ui.jqgrid-bootstrap.css')}}" />
	<script>
	</script>
	<script type="text/ecmascript" src="{{asset('bootstrap-3.3.4-dist/js/bootstrap.min.js') }}"></script>
	<meta charset="utf-8" />

	<title>jqGrid Loading Data - Million Rows from a REST service</title>

</head>
<body>

<div class="container">


		<div class="row">
				<p class="brand-title"><h2>Reservation List</h2></p>


				<button id="btnSearch" type="button">Search</button>

		</div>
		<div>
			<input id="txtFName" name="txtFName" type="text" class="form-control input-md" style="width:200px">
			<input id="txtLName" name="txtLName" type="text" class="form-control input-md" style="width:200px">
		</div>

		<div style="margin-left:20px">
			<table id="jqGrid"></table>
			<div id="jqGridPager" style="height:40px;"></div>
		</div>



</div>


<script type="text/javascript">

    $(document).ready(function () {
        $("#jqGrid").jqGrid({
            datatype: "local",
            mtype: "GET",

            styleUI : 'Bootstrap',
            colNames:['Id','Fist name', 'Last name', 'Phone','Country'],
            colModel: [
                { index:'Id', name: 'item1', key: true, width: 75 },
                { index:'Fist name', name: 'item2', width: 150 },
                { index:'Last name', name: 'item3', width: 150 },
                { index:'Phone', name: 'item4', width: 150 },
                { index:'Country', name: 'item5', width: 150 }
            ],
            viewrecords: true,
            height:400,
            rowNum: 10,
            pager: "#jqGridPager",


            ondblClickRow: function(rowId) {
                var rowData = jQuery(this).getRowData(rowId);
                var OrderID = rowData['CustomerID'];

                var aQryStr = "OrderID= " + OrderID ;
                alert(aQryStr)

            },
            loadComplete: function(){

			}
        });
        //jQuery("#jqGrid").jqGrid('filterToolbar',{autosearch : false});
		var jList = [];
        $('#jqGrid').jqGrid('setGridWidth', '800');



		function addData(result){

		    for(var i = 0; i< result.length; i++){
		        var x ={
					item1: result[i].id,
						item2: result[i].first_name,
						item3: result[i].last_name,
						item4: result[i].phone,
						item5: result[i].country
				};
		        jList.push(x);
			}
            jQuery("#jqGrid").setGridParam({data: jList });
            jQuery("#jqGrid")[0].refreshIndex();
            jQuery("#jqGrid").trigger("reloadGrid");
		}

		function searchData(fname,lname) {
            jList = [];
            $.ajax({

                url: 'K003/Id',
                method: 'GET',
                cache: false,
                data:{
                    fname: fname,
					lname: lname
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
            $fname = $('#txtFName').val()
            $lname = $('#txtLName').val()
            jQuery("#jqGrid").jqGrid("clearGridData");
            jQuery("#jqGrid")[0].refreshIndex();
            jQuery("#jqGrid").trigger("reloadGrid");
            searchData($fname,$lname);
		});
    });

</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
</script>

</body>
</html>