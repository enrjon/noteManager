<?php
	// Password reset script used to update user table with new user password
	require 'db.php';
	session_start();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
		// Verify matching passwords
    	if($_POST['newpassword'] == $_POST['confirmpassword']){ 

        	$new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
        
       		// $_POST['email'] and $_POST['hash'] are sourced from reset.php
		    $email = $mysqli -> escape_string($_POST['email']);
		    $hash = $mysqli -> escape_string($_POST['hash']);
		    
		    $sql = "UPDATE c1.users SET password='$new_password', hash='$hash' WHERE email='$email'";

		    if($mysqli -> query($sql)){

				$_SESSION['message'] = "Your password has been reset successfully!";
				header("location: success.php");    

		    }

		}else{
		    $_SESSION['message'] = "Two passwords you entered don't match, try again!";
		    header("location: error.php");    
		}

	}

?>
