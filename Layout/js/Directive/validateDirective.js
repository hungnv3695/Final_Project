(function(){
	myApp.directive('customValidation',function(){
            return{
            restrict:'A',
            require: 'ngModel',
            link:function (scope, element, attr, ctrl) {// 4th argument contain model information 

            function validationError(value) // you can use any function and parameter name 
                {
			        if(!/[ \t]{2,}/.test(value)){
			        	ctrl.$setValidity('no2space', false);
			        }else{
			        	ctrl.$setValidity('no2space', true);
			        }
			        
			        if(!/[ \t]{2,}/.test(value)){
			        	ctrl.$setValidity('no2space', true);
			        }else{
			        	ctrl.$setValidity('no2space', false);
			        }


                	if (/^((?![0-9\~\!\@\#\$\%\^\&\*\(\)\_\+\=\-\[\]\{\}\;\:\"\\\/\<\>\?]).)+$/.test(value)) {
			            ctrl.$setValidity('noSpecialCharacter', true);
			        } else {
			            ctrl.$setValidity('noSpecialCharacter', false);
			        }
			        
			        return value;
                }
                ctrl.$parsers.push(validationError); //parsers change how view values will be saved in the model
            }
            };
        });
	myApp.directive('customPhoneValidation',function(){
            return{
            restrict:'A',
            require: 'ngModel',
            link:function (scope, element, attr, ctrl) {// 4th argument contain model information 

            function validationError(value) // you can use any function and parameter name 
                {
			        if(!/[0-9]{6,16}$/.test(value)){
			        	ctrl.$setValidity('phonenumber', false);
			        }else{
			        	ctrl.$setValidity('phonenumber', true);
			        }
			        
			        return value;
                }
                ctrl.$parsers.push(validationError); //parsers change how view values will be saved in the model
            }
            };
        });
})();