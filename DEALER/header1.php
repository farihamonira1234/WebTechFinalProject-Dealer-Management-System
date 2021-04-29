<!--
this is second header file which is visible after login.
-->

<?php
include_once('link.php');
session_start();
$username = $_SESSION['username'];
?>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a href="#" class="navbar-brand">Registration Login</a>
		</div>
		<div class="dropdown navbar-right" id="right">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo ($_SESSION ['username']);?>
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
  	<li><a href="signup.php">Account</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
</div>
	</div>
</nav>