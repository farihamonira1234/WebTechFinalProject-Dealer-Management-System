<?php

$mysqli = new mysqli("localhost", "root", "", "project");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sqlE = "SELECT Email FROM users WHERE Email = ?";

$stmt = $mysqli->prepare($sqlE);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($email);
$stmt->fetch();
$stmt->close();

if ($email)
{
	echo '<span style="color:red;text-align:center;">Email Not Available</span>';
}
else
{
	echo '<span style="color:green;text-align:center;">Email Available</span>';
}
/*{
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      echo "Must be a valid email address: anything@example.com";
    }
    else
    	echo "Email Available";
}*/
?>