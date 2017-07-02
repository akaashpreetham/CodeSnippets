
<!DOCTYPE html>
<html>
<head>
	<title>View</title>
	<link rel="stylesheet" type="text/css" href="StyleHomePage.css">
</head>
<body>
	<?php
		if(isset($_GET['num'])){
			$num=$_GET['num'];
			$connect=mysqli_connect('localhost','root','','TEST');
			$query="SELECT snip FROM snips WHERE num=$num";
			$result=mysqli_query($connect,$query);
			if(mysqli_num_rows($result)){
				$row=mysqli_fetch_array($result);
				$elt=($row['snip']);
				echo "<div class='snippet'><pre>$elt</pre></div>";
			}
			else{
				echo "<div class='snippet'>Code Not Found</div>";
			}
		}
		else{
			$connect=mysqli_connect('localhost','root','','TEST');
			$query="SELECT snip FROM snips ORDER BY num";
			$result=mysqli_query($connect,$query);
			while($row=mysqli_fetch_array($result)){
				$elt=($row['snip']);
				echo "<div class='snippet'><pre><code>$elt</code></pre></div>";
			}
		}
	?>
	<form method="get" action="<?php echo htmlspecialchars('ShowSnip.php');?>"></form>
</body>
</html>