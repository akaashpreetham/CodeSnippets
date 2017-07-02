<?php include('Server1.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="StyleLoginPage.css">
</head>
<body>
	<form class="form" method="POST" action="<?php echo htmlspecialchars('Login.php');?>">
		<div class="formelements">
			<h1 id="header">Login</h1>
		</div>
		<?php include('errors.php');?>
		<div class="formelements">
			<label>Username:</label><br>
			<input type="text" name="username">
		</div>
		<div class="formelements">
			<label>Password:</label><br>
			<input type="password" name="password">
		</div>
		<div class="formelements">
			<button id="btn" name="login">Log In</button>
		</div>
		<div class="formelements">
			<p style="font-size: 15px">Don't have an account yet? <a href="Register.php">Register here</a></p>
		</div>
	</form>
</body>
</html>