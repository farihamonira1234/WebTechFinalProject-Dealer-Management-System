<?php

require_once '../Model/DATABASE.php';

session_start();

$email = "";
$emailErr = "";
$errors = array();

// FORGOT PASSWORD
if (isset($_POST['forgot_pass'])) 
{
  $email = strtoupper(mysqli_real_escape_string($db, $_POST['email']));

  //Email
  if (empty($email)) 
  {
    $emailErr = "Cannot be empty";
    array_push($errors, "");
  } 
  else 
  {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $emailErr = "Must be a valid email address: anything@example.com";
      array_push($errors, "");
    }
  }
  if (count($errors) == 0) 
  {
    // Email match
    $sql = "SELECT UserName, Role FROM users WHERE Email='$email'";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
       while($row = mysqli_fetch_assoc($result)) 
       {
        $uname = $row["UserName"];
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
      array_push($errors, "Email Not Matched");
    }
  }
}
?>