var myPlugin = {};
(function(){
	myPlugin.todayddmmyyyy = function(){
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!

		var yyyy = today.getFullYear();
		if(dd<10){
		    dd='0'+dd;
		} 
		if(mm<10){
		    mm='0'+mm;
		} 
		var today = dd+'/'+mm+'/'+yyyy;
		return today;
	}
	myPlugin.showRoomBook = function(){
		$('#book-window').css('display','block');
		$('#book-window').addClass('animated fadeInDown');
	}
	myPlugin.showInfo = function(){
		$('#infomation-text').parent().css('display','block');
		$('#infomation-text').parent().addClass('animated fadeInDown');
	}
	myPlugin.closeInfo = function(){
		$('#infomation-text').parent().removeClass('animated fadeInDown');
		$('#infomation-text').parent().addClass('animated fadeOutUp');
		setTimeout(function(){
			$('#infomation-text').parent().removeClass('animated fadeOutUp');
			$('#infomation-text').parent().css('display','none');
		},400)
	}
})();