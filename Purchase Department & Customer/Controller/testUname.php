<?php

$mysqli = new mysqli("localhost", "root", "", "project");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sqlU = "SELECT UserName FROM users WHERE UserName = ?";

$stmt = $mysqli->prepare($sqlU);
$stmt->bind_param("s", $_GET['p']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($uname);
$stmt->fetch();
$stmt->close();

if ($uname)
{
	echo '<span style="color:red;text-align:center;">Username Not Available</span>';
}
else
{
	echo '<span style="color:green;text-align:center;">Username Available</span>';
}

?>