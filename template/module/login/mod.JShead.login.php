  $(function() {
						$( "#dialog-message" ).dialog({
						  modal: true,
						  autoOpen: false,
						  width: 500,
						  buttons: {
							Ok: function() {
							  $( this ).dialog( "close" );
							}
						  }
						});
	  });


var Login = {

	path: "/template/module/login/operations.php",

	sendLogin: function(){
	
		var noerror = true;
	
		var email = $('#email').val();
		var password = $('#password').val();
		
		if(email == "" && !Login.validateEmail(email))
		{
			noerror = false;
		}
		
		if(password == "")
		{
			noerror = false;
		}
		
		if(noerror){
			$.post(Login.path, {operation: "login", email, password}, function(data){
				if(data == '1'){
					location.reload();
				}
				else{
					$( "#dialog-message" ).dialog( "open" );
				}
			});
		}
		else{
			$( "#dialog-message" ).dialog( "open" );
		}
	
	},
	
	
	
	logout: function(){
	
				$.post(Login.path, {operation: "logout"}, function(data){
				if(data == '1'){
					location.reload();
				}
			});
	
	
	},
	
	
	

	validateEmail: function($email) {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		return emailReg.test( $email );
	}


}