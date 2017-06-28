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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- The link to the CSS that the grid needs -->
	<link rel="stylesheet" type="text/css" media="screen" href="{{asset('jqgrid/css/ui.jqgrid-bootstrap.css')}}" />
	<script>
        $.jgrid.defaults.width = 780;
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<meta charset="utf-8" />

	<title>jqGrid Loading Data - Million Rows from a REST service</title>
	<!--<script>
        body
        {
            background:url(img/IMG_3151.JPG) fixed;
            background-size: cover;
            padding: 0;
            margin: 0;
        }
        p.brand-title
        {
            font-family: 'Open Sans' , sans-serif;
            font-size: 30px;
            font-weight: 600;
            text-align: center;
            color:rgb(16,54,103);
            text-transform: uppercase;
            letter-spacing: 4px;
        }
        .btn:hover
        {
            background-color:rgb(194,194,194);
        }
	</script>-->
</head>
<body>

<div class="container">

	<form id="1">


		<div class="row">
			<div class="col-md-12" style="margin-top:5%;background-color:rgb(236,236,236);">
				<p class="brand-title"><h2>Reservation List</h2></p>
			</div>

			<div class="col-md-12" style="background-color:rgb(215,215,215);">
				<button id="btnSearch" type="button">Search</button>
				<table id="jqGrid" style="boder:10px"> </table>
				<div id="jqGridPager"></div>
			</div>
			<div class="col-md-12" style="background-color:rgb(236,236,236);">

			</div>
		</div>
	</form>

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
            viewrecords: false,
            height: 250,
            rowNum: 20,
            //pager: "#jqGridPager",
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


        $("#btnSearch").click(function(){
            jQuery("#jqGrid").jqGrid("clearGridData");
            jQuery("#jqGrid")[0].refreshIndex();
            jQuery("#jqGrid").trigger("reloadGrid");
            jList = [];
            $.ajax({

                url: 'K003/Id',
                method: 'GET',
                cache: false,
                dataType: 'json',


                contentType: 'application/json; charset=utf-8',
                success: function (response) {
                    console.log(response);

                    addData($.parseJSON(response));
                    //addDataTable(guest);
                },
                error: function(){
                    alert('fff');
                }

            });



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