<!DOCTYPE html>
<html>
<head>
	<title>Header</title>
</head>
<body>
	
<?php 
session_start();
 ?>

	
	<p style="font-size: 30px; background-color: #F1C9AE " align="right" > Logged in as <?php echo "&nbsp".$_SESSION['uname']."&nbsp";?><b>|</b><a href="logoutcontrol.php"><b>Logout</b></a>
	</p>
     
</body>
</html>