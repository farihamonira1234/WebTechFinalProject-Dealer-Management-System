<?php

require_once '../Model/DATABASE.php';

session_start(); 

$message = "";
$crpass = $npass = $rnpass = $matchpass = "";
$crpassErr = $npassErr = $rnpassErr = "";
$errors = array(); 

// CHANGE PASSWORD
if (isset($_POST['change_pass'])) 
{
  $crpass = mysqli_real_escape_string($db, $_POST['crpass']);
  $npass = mysqli_real_escape_string($db, $_POST['npass']);
  $rnpass = mysqli_real_escape_string($db, $_POST['rnpass']);

  // Current Password
  if (empty($crpass)) 
  {
    $crpassErr = "Cannot be empty";
    array_push($errors, "");
  }
  else
  {
    if (!preg_match("/^([A-Za-z0-9 .-_]).{7,}$/",$crpass)) 
    {
      $crpassErr = "Password must not be less than eight (8) characters";
      array_push($errors, "");
    }

    elseif (!preg_match("/^(?=.*?[#?!@$%^&*-]).{1,}$/", $crpass)) 
    {
      $crpassErr = "Password must contain at least one of the special characters (@, #, $, %)";
      array_push($errors, "");
    }   
  }

  // New Password
  if (empty($npass)) 
  {
    $npassErr = "Cannot be empty";
    array_push($errors, "");
  }
  else
  {
    if (!preg_match("/^([A-Za-z0-9 .-_]).{7,}$/",$npass)) 
    {
      $npassErr = "Password must not be less than eight (8) characters";
      array_push($errors, "");
    }

    elseif (!preg_match("/^(?=.*?[#?!@$%^&*-]).{1,}$/", $npass)) 
    {
      $npassErr = "Password must contain at least one of the special characters (@, #, $, %)";
      array_push($errors, "");
    }   
  }

  // Retype New Password
  if (empty($rnpass)) 
  {
    $rnpassErr = "Cannot be empty";
    array_push($errors, "");
  }
  else
  {
    if (!preg_match("/^([A-Za-z0-9 .-_]).{7,}$/",$rnpass)) 
    {
      $rnpassErr = "Password must not be less than eight (8) characters";
      array_push($errors, "");
    }

    elseif (!preg_match("/^(?=.*?[#?!@$%^&*-]).{1,}$/", $rnpass)) 
    {
      $rnpassErr = "Password must contain at least one of the special characters (@, #, $, %)";
      array_push($errors, "");
    }   
  }

  // Current Password match
  $uname = $_SESSION['uname'];
  $sql = "SELECT Password FROM users WHERE UserName='$uname'";
  $result = mysqli_query($db, $sql);

  if (mysqli_num_rows($result) > 0) 
  {
     while($row = mysqli_fetch_assoc($result)) 
     {
      $matchpass = $row["Password"];
     }
  } 
  if (md5($crpass) != $matchpass) 
  {
    $crpassErr = "Current Password Not Matched";
    array_push($errors, "");
  }
  else
  {
    //current and new pass should not match
    if ($crpass == $npass) 
    {
      $npassErr = "New Password should not be same as the Current Password";
      array_push($errors, "");

    }
    //new and retype pass match
    elseif ($npass != $rnpass) 
    {
      $rnpassErr = "New Passwords Not Matched";
      array_push($errors, "");
    }
  }

  if (count($errors) == 0) 
  {
    $uname = $_SESSION['uname'];
    $npass = md5($npass);
    $query = "UPDATE users SET Password='$npass' WHERE UserName = '$uname'";
    if (mysqli_query($db, $query)) 
    {
      echo "Password Changed successfully";
    } 
    else 
    {
      echo "Error Changing Password: " . mysqli_error($db);
    }
    $_SESSION['uname'] = $uname;
    header('location:dashboard.php');
  }
}

?>