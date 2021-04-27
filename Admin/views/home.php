<?php
	require_once('../php/session_header.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body  style="background-color:powderblue;">
	<h1>Welcome Home!<?=$_SESSION['username']?></h1> 
	<a href="../views/create.php">Create New User</a> |
	<a href="../views/all_users.php">User List</a> |
	<a href="../views/createcompanyinfo.php">Create Company Info</a> |
	<a href="../views/all_company.php">Company List</a> |
	<a href="../php/logout.php">Logout</a> 
</body>
</html>