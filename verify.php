<?php 
	// Used to verify user from verification email link from register.php
	require 'db.php';
	session_start();

	// Check for empty email and hash variables
	if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){

		$email = $mysqli->escape_string($_GET['email']); 
		$hash = $mysqli->escape_string($_GET['hash']); 

		// Queries for unregistered user with matching data
		$result = $mysqli->query("SELECT * FROM c1.users WHERE email='$email' AND hash='$hash' AND active='0'");

		if ( $result->num_rows == 0 ){ 
			$_SESSION['message'] = "Account has already been activated or the URL is invalid!";

			header("location: error.php");

		}else{

			$_SESSION['message'] = "Your account has been activated!";

			// Sets user active = 1, indicating confirmed registration
			$mysqli->query("UPDATE c1.users SET active='1' WHERE email='$email'") or die($mysqli->error);
			$_SESSION['active'] = 1;

			header("location: success.php");
		}
	}else{

		$_SESSION['message'] = "Invalid parameters provided for account verification!";
		header("location: error.php");
	}     
?>
