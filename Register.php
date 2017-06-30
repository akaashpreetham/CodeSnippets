<?php include('Server1.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="StyleLoginPage.css">
</head>
<body>
	<form class="form" method="POST" action="<?php echo htmlspecialchars('Register.php');?>">
		<div class="formelements">
			<h1 id="header">Register</h1>
		</div>
		<?php include('errors.php');?>
		<div class="formelements">
			<label>Username:</label><br>
			<input type="text" name="username" value="<?php echo $username;?>">
		</div>
		<div class="formelements">
			<label>Email:</label><br>
			<input type="text" name="email" value="<?php echo $email;?>">
		</div>
		<div class="formelements">
			<label>Password:</label><br>
			<input type="password" name="password1">
		</div>
		<div class="formelements">
			<label>Confirm Password:</label><br>
			<input type="password" name="password2">
		</div>
		<div class="formelements">
			<button id="btn" name="submit">Sign Up</button>
		</div>
		<div class="formelements">
			<p style="font-size: 15px">Already have an account? <a href="Login.php">Sign in here</a></p>
		</div>
	</form>
</body>
</html>