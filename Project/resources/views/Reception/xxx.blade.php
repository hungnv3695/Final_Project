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
	<style type="text/css">
		body
		{
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
			height:80px;
			line-height:80px;
		}
		hr
		{
			border-color:gray;
		}

	</style>
</head>
<body>
<form id="myForm">
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
            <div class="col-md-12 col-xs-12" style="margin-top:1%;background-color:rgb(245,245,245);">
                <p class="brand-title">Reservation List</p>
            </div>
            <div class="col-md-12 col-xs-12" style="background-color:rgb(236,236,236);">
                <div class="col-md-4 col-xs-7" style="margin-top:20px;">
                    <form class="form-horizontal">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-5 control-label" for="">Guest name:</label>
                                <div class="col-md-7">
                                    <input id="txtFName" name="txtFName" type="text" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label" for="">Status:</label>
                                <div class="col-md-7">
                                    <select id="cboStatus" name="cboStatus" class="form-control input-md">
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-md-4 col-xs-7" style="margin-top:20px;">
                    <form class="form-horizontal">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-5 control-label" for="">Identity:</label>
                                <div class="col-md-7">
                                    <input id="txtIdCard" name="txtIdCard" type="text" class="form-control input-md">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-md-3 col-md-offset-1 col-xs-7" style="margin-top:20px;">
                    <button id="btnSearch" class="button" type="button">Search</button>
                </div>
                <div class="col-md-12 col-xs-12"><hr></div>
                <div class="col-md-12 col-xs-12">
                    <table id="jqGrid" style="border:1px solid gray;"></table>
                    <div id="jqGridPager" style="height:40px;"></div>
                </div>
            </div>
            <div class="col-md-12 col-xs-12" style="background-color:rgb(245,245,245);">
                <div class="col-md-3 col-md-offset-9 col-xs-7" style="margin-top:10px;margin-bottom:10px;">
                    <button id="btnBack" class="button" type="button">Back</button>
                </div>
            </div>

        </div>
    </div>
</form>


</body>

<script src="{{asset('Scripts/K003/K003_1.js')}}"></script>
</html>