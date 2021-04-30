<?php require_once'logged.php'?>


<?php 




if (isset($_SESSION['uname'])) {
	//echo "<h1> Welcome ".$_SESSION['uname']."</h2>";
	echo "<a href='viewprofile.php'>View Profile</a><br>";
	//echo "<a href='editpassword.php'>Reset Password</a><br>";
	echo "<a href='editview.php'>Edit Profile</a><br>";
	echo "<a href='livesearch.php'>Live Search</a><br>";
	//echo "<br><a href='logout.php'>Logout</a><br>";


}
else{
		$msg="error";
		header("location:loginview.php");

	}

 ?>

 <?php require_once'footer.php'  ?>