<?php include('Server1.php');
	if(empty($_SESSION['username']))
		header('location: Login.php');
	$a='';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="StyleHomePage.css">
</head>
<body>
	<div class='welcome'>
	<?php if(isset($_SESSION['username'])):?>
		<form method="post" action="HomePage1.php">
		<h2>Hello, <?php echo $_SESSION['username']; ?></h2>
		<textarea name="inputtext"></textarea>
		<button name="paste">Paste Code</button>
		</form>
	<?php endif?>
	</div>
	<?php if(isset($_SESSION['username'])):?>
		<?php if(isset($_POST['paste'])):?>
				<?php 
					if(!empty($_POST['inputtext'])){
						$a=$_POST['inputtext'];
						$_POST['inputtext']='';
						$un=$_SESSION['username'];
						$que="UPDATE myuser SET data=concat(data,'<div class=\"snippet\">$a</div>') WHERE username='$un';";
						$connect=mysqli_connect('localhost','root','','TEST');
						mysqli_query($connect,$que);
					}
				?>
		<?php endif?>
		<?php
			$un=$_SESSION['username'];
			$connect=mysqli_connect('localhost','root','','TEST');
			$que2="SELECT data FROM myuser WHERE username='$un'";
			$element=mysqli_query($connect,$que2);
			$stringifiedelement= mysqli_fetch_assoc($element);
			$data=$stringifiedelement['data'];
			echo "$data";
		?>
	<?php endif?>
	<div id='logout'>
		<button><a style="color:white; text-decoration:none;" href="HomePage1.php?logout='1'">Logout</a></button>
	</div>
	<!--<script>
		var button=document.getElementsByTagName("button")[0];
		button.addEventListener("mousedown",pastecode);
		var store;
		var num;
		function pastecode(){
			if(document.getElementsByTagName("textarea")[0].value){
				var text=escape(document.getElementsByTagName("textarea")[0].value);
				var div=document.createElement("div");
				div.className="snippet";
				document.getElementsByTagName("textarea")[0].value="";
				var textNode=document.createTextNode(unescape(text)
					);
				div.appendChild(textNode);
				document.body.appendChild(div);
				num=document.getElementsByClassName("snippet").length;
				for(var i=0;i<num;i++){
					store=document.getElementsByClassName("snippet")[i];
					//console.log(store);
					<?php 
						/*$add="div";
						$code="div";
						echo "console.log($code);";
						$un=$_SESSION['username'];
						$que="UPDATE myuser SET data=concat(data,'$code') WHERE username='$un';";
						$connect=mysqli_connect('localhost','root','','TEST');
						mysqli_query($connect,$que);*/
					?>
				}	
				
			}
		}
	</script>-->
</body>
</html>