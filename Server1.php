<?php
	session_start();
	$username="";
	$email="";
	$errors=array();
	$connect=mysqli_connect('localhost','root','','TEST');
	if(isset($_POST['submit'])){
		$username=mysqli_real_escape_string($connect,$_POST['username']);
		$email=mysqli_real_escape_string($connect,$_POST['email']);
		$password1=mysqli_real_escape_string($connect,$_POST['password1']);
		$password2=mysqli_real_escape_string($connect,$_POST['password2']);
		$q=mysqli_query($connect,"SELECT * FROM myuser WHERE username='$username' OR email='$email'");
		if(mysqli_num_rows($q)>0)
			array_push($errors,"Username/email already exists");
		if(empty($username))
			array_push($errors, "Username is required");
		if(empty($email))
			array_push($errors,"e-mail is required");
		if(empty($password1))
			array_push($errors, "Password is required");
		if($password1!=$password2)
			array_push($errors,"The passwords do not match");
		if(count($errors)==0){
			$password=md5($password1);
			$sql="INSERT INTO myuser (Username, email, Password, data)
				VALUES ('$username', '$email', '$password', '')";
			mysqli_query($connect,$sql);
			$_SESSION['username']=$username;
			header('location: HomePage1.php');
		}
	}
	if(isset($_POST['login'])){
		$username=mysqli_real_escape_string($connect,$_POST['username']);
		$password=mysqli_real_escape_string($connect,$_POST['password']);
		if(empty($username))
			array_push($errors, "Username is required");
		if(empty($password))
			array_push($errors,"Password is required");
		if(count($errors)==0){
			$password=md5($password);
			$query="SELECT * FROM myuser WHERE username='$username' AND password='$password'";
			$result=mysqli_query($connect,$query);
			if(mysqli_num_rows($result)==1){
				$_SESSION['username']=$username;
				header('location: HomePage1.php');
			}
			else{
				array_push($errors, "Check your username and password");
			}
		}
	}
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['username']);
		header('location: Login.php');
	}
?>