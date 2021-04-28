<?php

require_once '../Model/DATABASE.php';

session_start();

$uname = $pass = "";
$unameErr = $passErr = "";
$errors = array();

// LOGIN USER
if (isset($_POST['login_user'])) 
{
  $uname = strtoupper(mysqli_real_escape_string($db, $_POST['uname']));
  $pass = mysqli_real_escape_string($db, $_POST['pass']);

  if (empty($uname)) 
  {
    $unameErr = "Username Cannot be empty";
    array_push($errors, "");
  }
  if (empty($pass)) 
  {
    $passErr = "Password Cannot be empty";
    array_push($errors, "");
  }

  if (count($errors) == 0) 
  {
    $pass = md5($pass);
    $query = "SELECT * FROM users WHERE UserName='$uname' AND Password='$pass'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) > 0) 
    {
      while($row = mysqli_fetch_assoc($results))
      {
        $_SESSION['uname'] = $uname;
        $_SESSION['success'] = "You are now logged in";
        header('location:dashboard.php');
        if( isset($_POST['remember']) )
        {
           // Set cookie variables
           setcookie ("remember",$uname,time()+60);
        }             
      }
    }
    else 
    {
      array_push($errors, "User Not Found. WHO ARE YOU? :)");
    }
  }
}