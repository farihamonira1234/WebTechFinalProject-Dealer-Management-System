<?php 

session_start();

if (isset($_SESSION['uname'])) 
{
	session_destroy();
	setcookie("remember","", time()-60);
	echo "SESSION destroy"."<br>";
	echo "COOKIE TimeOUT";
	header("location:login.php");	
}
else
{
	header("location:login.php");
}



 ?>