<?php
//require 'logged.php';
require 'model.php'; 
//require 'model.php';

if (isset($_SESSION['uname'])) 
{

require_once 'model.php';

$data = showData($_SESSION['ID']);
$uname = $data["UNAME"];
$password = $data["PASSWORD"];
}

else
{
header("location:loginview.php");
}

$uname = $password = $npassword = " ";
$unameErr = $passwordErr = $npasswordErr = " ";

if (isset($_POST['submit']) && isset($_POST['uname'])) 
{
	if (empty($_POST['uname']))
	 {
		$unameErr = "User Name is required";
	 }
	 if (empty($_POST['password'])) 
	 {
	 	$passwordErr = "Password is required";
	 }
	 if (empty($_POST['npassword'])) 
	 {
	 	$npasswordErr = "New Password is required";
	 }
	 else
	 {
	 	$data['password'] = $_POST['npassword'];

	 	if (updateData($_SESSION['ID'], $data)) {

 echo 'Successfully updated!!';
}
else {
echo 'Access Denied';
}
	 }
}

