var myApp = angular.module('myApp', ['ui.bootstrap']);
(function(){
	myApp.controller('bookCtr', bookCtr);
	bookCtr.$inject = ['$scope'];
	function bookCtr($scope) {
		$scope.resObj = {
			maxDate: 30,
			maxRoom: 4,
			maxAdults:4,
			minAdults:1,
			maxChildrens:4,
			minChildrens:0,
			defaultRomm:{
				adults:2,
				childrens:2,
				selected: false,
			},
			roomsSize:[{
				id:0,
				name:"Room king size bed",
				description:"1 king size bed",
				img:"img/king.jpg",
				price: 300
			},{
				id:1,
				name:"Room Twins Bed",
				description:"Twins bed",
				img:"img/queen.jpg",
				price: 200
			}]
		}
		$scope.roomsObj = {
			rooms:[$scope.resObj.defaultRomm],
			selectRoom: 0,
			nights: 1,
			total:10,
			addRoom: function(){
				if(this.rooms.length >= $scope.resObj.maxRoom)	return;
				this.rooms.push({
					adults:$scope.resObj.defaultRomm.adults,
					childrens:$scope.resObj.defaultRomm.childrens,
					selected: false,
				});
				this.checkSelectedRoom();
			},
			deleteRoom: function(){
				if(this.rooms.length <= 1)	return;
				this.rooms.pop();
				this.calTotal();
				this.checkSelectedRoom();
			},
			addAdult: function(i){
				if(this.rooms[i].adults >= $scope.resObj.maxAdults) return;
				this.rooms[i].adults ++;
			},
			removeAdult: function(i){
				if(this.rooms[i].adults <= $scope.resObj.minAdults) return;
				this.rooms[i].adults --;
			},
			addChildren: function(i){
				if(this.rooms[i].childrens >= $scope.resObj.maxChildrens) return;
				this.rooms[i].childrens ++;
			},
			removeChildren: function(i){
				if(this.rooms[i].childrens <= $scope.resObj.minChildrens) return;
				this.rooms[i].childrens --;
			},
			chooseRoom: function(room){
				this.rooms[this.selectRoom].name = room.name;
				this.rooms[this.selectRoom].description = room.description;
				this.rooms[this.selectRoom].price = room.price;
				this.rooms[this.selectRoom].selected = true;
				this.calTotal();
				this.checkSelectedRoom();
			},
			removeSelectRoom: function(i){
				this.rooms[i].selected = false;
				this.checkSelectedRoom();
				this.calTotal();
			},
			checkSelectedRoom: function(){
				for(j = 0; j < this.rooms.length; j++){
					if(this.rooms[j].selected == false){
						this.selectRoom = j;
						return true;
					}
				}
				this.selectRoom = -1;
				return false;
			},
			calTotal: function(){
				var t = 0;
				for(var i = 0; i < this.rooms.length; i++){
					if(this.rooms[i].selected){
						t += this.rooms[i].price * this.nights;
					}
				}
				this.total = t;
			}
		};
		$scope.checkInDate = {
			format:'dd/MM/yyyy',
			value: new Date(),
			isOpen: false,
			open: function(){
				this.isOpen = true;
			},
    		minDate: new Date(),
    		maxDate: new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate() + $scope.resObj.maxDate)
		}
		$scope.checkOutDate = {
			format:'dd/MM/yyyy',
			value: new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate() + 1),
			isOpen: false,
			open: function(){
				this.isOpen = true;
			},
    		minDate: new Date(),
    		maxDate: new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate() + $scope.resObj.maxDate)
		}
		$scope.$watch(function(scope) { return scope.checkInDate.value },
			function(newValue, oldValue) {
				var checkInDate = $scope.checkInDate.value;
				if(newValue >=  $scope.checkOutDate.value){
					$scope.checkOutDate.value = new Date(checkInDate.getFullYear(), checkInDate.getMonth(), checkInDate.getDate() + 1);
					$scope.checkOutDate.minDate = $scope.checkOutDate.value;
				}else{
					$scope.checkOutDate.minDate = new Date(checkInDate.getFullYear(), checkInDate.getMonth(), checkInDate.getDate() + 1);
				}
				var n = moment([newValue.getFullYear(), newValue.getMonth(), newValue.getDate()]);
				var l = moment([$scope.checkOutDate.value.getFullYear(), $scope.checkOutDate.value.getMonth(), $scope.checkOutDate.value.getDate()]);
				$scope.roomsObj.nights =  l.diff(n, 'days');
				$scope.roomsObj.calTotal();
			}
		);
		$scope.$watch(function(scope) { return scope.checkOutDate.value },
			function(newValue, oldValue) {
				var l = moment([newValue.getFullYear(), newValue.getMonth(), newValue.getDate()]);
				var n = moment([$scope.checkInDate.value.getFullYear(), $scope.checkInDate.value.getMonth(), $scope.checkInDate.value.getDate()]);
				$scope.roomsObj.nights =  l.diff(n, 'days');
				$scope.roomsObj.calTotal();
			}
		);
	}
})();