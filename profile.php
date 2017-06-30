<?php
/* Brings user to profile */
session_start();

// Check if user is logged in through the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $first_name.' '.$name ?></title>
  <?php include 'css/profile_css.html'; ?>
</head>

<body class = "dash">
  
	<ul class = "nav-dash"> 
		<div class = "logo-dash">
			NoteUs
		</div>
		<div class = "logo-menu">
			<li><a href = "logout.php">Logout</a></li>
			<li><a>Hello <?php // Displays current user in navigation bar
							echo $name ; ?>!</a></li>
		</div>
	</ul>
		
	<div class="box">
		<a href = "#addNote"><img class = "button-Note" src = "img/AddButton.png"></a>
	</div>
	
	<div id="addNote" class="overlay">
		<div class="noteAdd">
			<a class="close" href="#">&times;</a>
			<form class="form" action = "add_Note.php">
				<textarea row = "4" cols  = "50" name = "body" form = >Create message!</textarea>
			<button class="button button-block" name="addNote" />Add Message!</button>

			</form>
		</div>
	</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
