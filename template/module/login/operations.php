<?php

session_start();

$_SESSION['loggedIn'] = false;

$operation = $_POST['operation'];



if($operation == "login"){

	

	$username = $_POST['email'];
	$password = $_POST['password'];
	
	if($username == "admin" && $password == "123"){
	
		$_SESSION['username'] = $username;
		$_SESSION['loggedIn'] = true;
		
		echo '1';
	}else{
		session_destroy();
		echo '0';
	}
}


if($operation == "logout"){

session_destroy();
echo '1';

}
?>