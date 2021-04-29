<?php
require_once ("dbconnection.php");
$username="";
$pass="";

$username=$_POST['username'];
$pass=$_POST['pass'];

$conn=connection();

$sql= "SELECT * FROM `reg` WHERE username='$username' AND pass='$pass'";
$result= mysqli_query ($conn, $sql);
if (mysqli_num_rows($result)>0)
{
    while ($row= mysqli_fetch_assoc ($result))
    {
        $id=$row["id"];
        $username= $row["username"];
        session_start();
        $_SESSION ['id']= $id;
        $_SESSION ['username']=$username;
        header ("location: welcome.php");


    }
}
else
{
    echo "Enter valid data";
}




  ?>
