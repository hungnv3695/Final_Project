<!DOCTYPE html>
<html ng-app="myApp">
<head>
	<meta charset="UTF-8">
	<title>Book</title>
	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset( '/plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href=" {{ asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset( ' /plugins/animate/animate.cs' )}}s">
	<link rel="stylesheet" type="text/css" href=" {{asset('/css/index.css')}}">
	<script src="{{asset('/plugins/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset( '/plugins/bootstrap-3.3.7-dist/js/bootstrap.min.js' ) }}"></script>
	<script src=" {{asset('/bower_components/moment/moment.js')}}"></script>
	<script src="{{ asset('/bower_components/angular/angular.js') }}"></script>
	<script src="{{asset(' /bower_components/angular-bootstrap/ui-bootstrap-tpls.js ' )}}"></script>
	<script src=" {{asset('/js/myPlugin.js') }}"></script>
	<script src=" {{asset('/js/Controller/bookCtr.js' )}}"></script>
</head>
</head>
<body>
	<div id="page">
	<header>
		<div class="my-nav-container">
			<div class="container">
				<nav class="navbar navbar-default my-nav">
					<div class="container-fluid">
						<div class="navbar-header height-navbar">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand subtract-padding" href="#">
								<img id="brand-img" width="151" height="100" src="http://www.daewoohotel.com/templates/main/images/logo.svg?58f85f07944e1">
							</a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tiếng Việt <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">China</a></li>
										<li><a href="#">English</a></li>
										<li><a href="#">Japanese</a></li>
									</ul>
								</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="index.blade.php">Trang chủ</a></li>
								<li><a href="#">Phòng</a></li>
								<li><a href="#">Ảnh</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
	</header>
	<div id="content">
		<article>
			<div>
				<img class="img-responsive" style="width: 100%" src=" {{asset( '/img/book.jpg' ) }}">
			</div>
			<div ng-controller="bookCtr">
				<div class="option-panel-container ">
					<div class="container container-fluid-for-small-screen">
						<div class="row">
							<div class="col-xs-12 col-sm-3 col-sm-push-6 col-sm-offset-1">
								<button class="btn-apply-criterial" ng-init="isApplyCriterial=false" ng-click="isApplyCriterial=true">Apply Criterial</button>
							</div>
							<div class="col-xs-12 col-sm-3 col-sm-pull-4">
								 <p class="checkInOut-label">Check in date</p>
								 <p class="input-group">
									<input type="text" class="form-control disabled" uib-datepicker-popup="{{checkInDate.format}}" ng-model="checkInDate.value" is-open="checkInDate.isOpen" datepicker-options="checkInDate" ng-required="true" alt-input-formats="altInputFormats" />
									<span class="input-group-btn">
										<button type="button" class="btn btn-default" ng-click="checkInDate.open()"><i class="glyphicon glyphicon-calendar"></i></button>
									</span>
								</p>
							</div>
							<div class="col-xs-12 col-sm-3 col-sm-pull-4">
								<p class="checkInOut-label">Check out date</p>
							 	<p class="input-group">
									<input type="text" class="form-control disabled" uib-datepicker-popup="{{checkOutDate.format}}" ng-model="checkOutDate.value" is-open="checkOutDate.isOpen" datepicker-options="checkOutDate" ng-required="true" alt-input-formats="altInputFormats" />
									<span class="input-group-btn">
										<button type="button" class="btn btn-default" ng-click="checkOutDate.open()"><i class="glyphicon glyphicon-calendar"></i></button>
									</span>
								</p>
							</div>
						</div>
						<div>
							<div class="row row-of-room" ng-repeat="room in roomsObj.rooms">
								<div class="col-xs-12 col-sm-2">
									<div><i class="fa fa-home" aria-hidden="true"></i> Room {{$index + 1}}</div>
								</div>
								<div class="col-xs-12 col-sm-5">
									<div class="col-xs-6 updown">
										<div class="input-group">
											<span class="input-group-addon" ng-click="roomsObj.removeAdult($index)"><i class="fa fa-minus" aria-hidden="true"></i></span>
											<input type="text" class="form-control disabled" ng-value="room.adults">
											<span class="input-group-addon" ng-click="roomsObj.addAdult($index)"><i class="fa fa-plus" aria-hidden="true"></i></span>
										</div>	
									</div>
									<div class="col-xs-6">
										Adults
									</div>
								</div>
								<div class="col-xs-12 col-sm-5">
									<div class="col-xs-6 updown">
										<div class="input-group">
											<span class="input-group-addon" ng-click="roomsObj.removeChildren($index)"><i class="fa fa-minus" aria-hidden="true"></i></span>
											<input type="text" class="form-control disabled" ng-value="room.childrens">
											<span class="input-group-addon" ng-click="roomsObj.addChildren($index)"><i class="fa fa-plus" aria-hidden="true"></i></span>
										</div>	
									</div>
									<div class="col-xs-6">
										Childrens <i class="fa fa-exclamation-circle" aria-hidden="true" tooltip-placement="bottom" uib-tooltip="(0-12 years)"></i>
									</div>
								</div>
							</div>
							<div ng-if="roomsObj.rooms.length > 1"><a href="javascript:void(0)" ng-click="roomsObj.deleteRoom()">Remove a room</a></div>
							<div ng-if="roomsObj.rooms.length < resObj.maxRoom"><a href="javascript:void(0)" ng-click="roomsObj.addRoom()">Add room</a></div>
						</div>
					</div>
				</div>
				<div class="container container-fluid-for-small-screen" ng-if="isApplyCriterial" >
					<div class="row">
						<div class="col-xs-12 col-sm-5" ng-class="(roomsObj.selectRoom==-1)?'opacity':''">
							<div ng-repeat="r in resObj.roomsSize" style="margin: 0px 0 15px 0;">
								<div class="col-xs-12 top-rooms">{{r.name}}</div>
								<div><img ng-src="{{r.img}}" class="img-responsive"></div>
								<div class="room-bottom">
									<div class="col-xs-12 col-sm-6">{{r.description}}</div>
									<div class="col=sx-12 col-sm-6 room-price-add">
										<div>{{roomsObj.nights * r.price}}$</div>
										<div>{{roomsObj.nights}} nights, {{roomsObj.rooms[roomsObj.selectRoom].adults}} people</div>
										<div><button class="btn btn-primary btn-add-room" ng-click="roomsObj.chooseRoom(r)">Add</button></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-3 col-sm-offset-2">
							<div ng-repeat="room in roomsObj.rooms">
								<div class="room-select-detail" ng-if="room.selected">
									<div class="col-xs-8 room-select-detail-room"><i class="fa fa-home" aria-hidden="true"></i> Room {{$index + 1}}</div>
									<div class="col-xs-4 room-select-detail-price">{{roomsObj.nights * room.price}}$</div>
									<div class="col-xs-11 col-xs-offset-1 room-select-detail-des">{{roomsObj.nights}} nights, {{room.adults}} people</div>
									<div class="col-xs-11 col-xs-offset-1 room-select-detail-des">{{room.description}}</div>
									<div style="text-align: right"><a href="javascript:void(0)" ng-click="roomsObj.removeSelectRoom($index)"><i class="fa fa-times" aria-hidden="true"></i> Remove</a></div>
								</div>
							</div>
							<div class="room-select-choice" ng-if="roomsObj.selectRoom >= 0 ">
								<div>Select room {{roomsObj.selectRoom + 1}} </div>
							</div>
							<div class="room-select-total">
								<div class="col-xs-8 room-select-detail-room">Total</div>
								<div class="col-xs-4 room-select-detail-price">{{roomsObj.total}}$</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
		<div class="social-bar">
			<div class="container">
				<a href="#"><i class="fa fa-2x fa-instagram" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-2x fa-facebook-square" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>
	<footer class="footer-distributed">

			<div class="footer-left">

				<h3>Company<span>logo</span></h3>

				<p class="footer-links">
					<a href="#">Home</a>
					·
					<a href="#">Blog</a>
					·
					<a href="#">Pricing</a>
					·
					<a href="#">About</a>
					·
					<a href="#">Faq</a>
					·
					<a href="#">Contact</a>
				</p>

				<p class="footer-company-name">Copyrigh &copy; Bản quyền thuộc về khách sạn Hà Nội Daewoo 2017</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Khách sạn Hà Nội Daewoo, 360 Kim Mã, Ba Đình  </span> Hà Nội, Việt Nam</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>01639 919 633</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="#">nhanghimayhong.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>About the company</span>
					Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
				</p>

				<div class="footer-icons">

					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>

				</div>

			</div>

		</footer>
	</div>
</body>
</html>