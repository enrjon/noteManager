<?php /* Main page:login or register */
	require 'db.php';
	session_start();
?>
<!DOCTYPE html>

<html>
<head>
	<title>Register/Login</title>
	<?php include 'css/css.html';?>
</head>
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['login'])){ // Used for logging in

			require 'login.php';

		}elseif(isset($_POST['register'])){ // Used for new user registering

		require 'register.php';		
	
		}
	}
?>
<body>
	<ul class = "nav">
		<div class = "logo">
			NoteUs
		</div>
	</ul>

	<div class="form">
			
		<ul class="tab-group">
			<li class="tab"><a href="#signup">Sign Up</a></li>
			<li class="tab active"><a href="#login">Log In</a></li>
		</ul>
		
		<div class="tab-content">

			 <div id="login">	 
				<h1>Welcome to NoteUs!</h1>
				
				<h3 class = "req">* - Required</h3>
			
				<form action="index.php" method="post" autocomplete="off">
				
				<div class="field-wrap">
					<label>
						Email Address<span class="req">*</span>
					</label>
					<input type="email" required autocomplete="off" name="email"/>
				</div>
				
				<div class="field-wrap">
					<label>
						Password<span class="req">*</span>
					</label>
					<input type="password" required autocomplete="off" name="password"/>
				</div>
				
				<p class="forgot"><a href="forgot.php">Forgot Password?</a></p>
				
				<button class="button button-block" name="login" />Log In</button>
				
				</form>

			</div>
				
			<div id="signup">	 
				<h1>Register for Free</h1>

				<h3 class = "req">* - Required</h3>

				<form action="index.php" method="post" autocomplete="off">
				
					<div class = "top-row">

					<div class="field-wrap">
						<label>
							Name<span class="req">*</span>
						</label>
						<input type="text" required autocomplete="off" name='name' />
					</div>
			 		</div>
				<div class="field-wrap">
					<label>
						Email Address<span class="req">*</span>
					</label>
					<input type="email"required autocomplete="off" name='email' />
				</div>
				
				<div class="field-wrap">
					<label>
						Choose A Password<span class="req">*</span>
					</label>
					<input type="password"required autocomplete="off" name='password'/>
				</div>

				
				<button type="submit" class="button button-block" name="register" />Register</button>
				
				</form>

			</div>	
			
		</div>
			
</div>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

	<script src="js/index.js"></script>
</body>
</html>
