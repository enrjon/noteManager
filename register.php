<?php
/* Registration script, used to insert user data user table and sends verification email */

// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['name'] = $_POST['name'];

// Uses escape_string to protect against SQL injection
$name = $mysqli->escape_string($_POST['name']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
      
// Check user table for email address
$result = $mysqli->query("SELECT * FROM c1.users WHERE email='$email'") or die($mysqli->error());

// Check if email has already been registered
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
else {

    // active set to 0 by DEFAULT
    $sql = "INSERT INTO c1.users (name, email, password, hash) " 
            . "VALUES ('$name','$email','$password', '$hash')";

    // Add user data to the user table
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!

				http://localhost/noteManager/login/verify.php?email=$email&hash=$hash";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification from NoteUs';
        $message_body = '
        Hello '.$name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/noteManager/login/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );

        header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}
