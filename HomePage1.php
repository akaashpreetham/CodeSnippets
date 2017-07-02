<?php include('Server1.php');
	if(empty($_SESSION['username']))
		header('location: Login.php');
	$a='';
?>
<!DOCTYPE html>
<html style="background-color:rgb(112,112,112)">
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="StyleHomePage.css">
</head>
<body>
	<div class='welcome'>
	<?php if(isset($_SESSION['username'])):?>
		<form method="get" action="<?php echo htmlspecialchars('HomePage1.php');?>">
		<h2>Hello, <?php echo $_SESSION['username']; ?></h2>
		<textarea name="inputtext"></textarea>
		<button name="paste">Paste Code</button>
		</form>
	<?php endif?>
	</div>
	<?php if(isset($_SESSION['username'])):?>
		<?php if(isset($_GET['paste'])):?>
				<?php 
					if(!empty($_GET['inputtext'])){
						$a=htmlentities($_GET['inputtext']);
						$un=$_SESSION['username'];
						$que1="INSERT INTO snips(id,snip) VALUES((SELECT id FROM myuser WHERE username='$un'),'$a');";
						$connect=mysqli_connect('localhost','root','','TEST');
						mysqli_query($connect,$que1);
					}
				?>
		<?php endif?>
		<?php
			$un=$_SESSION['username'];
			$connect=mysqli_connect('localhost','root','','TEST');
			$que2="SELECT snip,num FROM snips WHERE id=(SELECT id FROM myuser WHERE username='$un')";
			$element=mysqli_query($connect,$que2);
			while($stringifiedelement= mysqli_fetch_array($element)){
				$data=($stringifiedelement['snip']);
				$num=htmlentities($stringifiedelement['num']);
				echo "<div class='snippet' style='background-color:rgb(56,56,56)'><pre>$data</pre><br><a style='color:pink; font-size:15px; text-decoration:none;' href='ShowSnip.php?num=$num'>GET SHAREABLE LINK</a></div>";
			}
		?>
	<?php endif?>
	<div id='logout'>
		<button><a style="color:white; text-decoration:none;" href="HomePage1.php?logout='1'">Logout</a></button>
	</div>
</body>
</html>