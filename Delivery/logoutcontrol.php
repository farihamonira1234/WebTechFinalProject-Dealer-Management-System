<?php 

session_start();

if (isset($_SESSION['uname'])) {
	session_destroy();
	header("location:loginview.php");
	
}

else{
	header("location:loginview.php");
}

 ?>