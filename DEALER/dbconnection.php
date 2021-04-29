<?php 
function connection()
{
	$host="localhost";
	$user="root";
	$pass="";
	$db_name="nobita";

	$con = new mysqli ($host,$user,$pass,$db_name);
	return $con;

}





 ?>