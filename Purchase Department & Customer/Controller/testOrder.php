<?php

$mysqli = new mysqli("localhost", "root", "", "project");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sqlO = "SELECT `Order ID` FROM orders WHERE `Order ID` = ?";

$stmt = $mysqli->prepare($sqlO);
$stmt->bind_param("i", $_GET['p']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($orders);
$stmt->fetch();
$stmt->close();

if ($orders)
{
	echo '<h4 style="color:green;text-align:center;">Order Exists</h4>';
}
else
{
	echo '<h4 style="color:red;text-align:center;">Order Does Not Exist</h4>';
}

?>