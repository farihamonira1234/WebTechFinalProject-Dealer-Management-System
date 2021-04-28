<?php

require_once '../Model/DATABASE.php';

session_start(); 

$message = "";
$name = $email = $phone = $address = "";
$nameErr = $emailErr = $phoneErr = $addressErr = "";
$errors = array();

// EDIT USER
if (isset($_POST['edit_user']))
{
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = strtoupper(mysqli_real_escape_string($db, $_POST['email']));
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $address = mysqli_real_escape_string($db, $_POST['address']);


  //Name
  if (empty($name)) 
  {
    $nameErr = "Cannot be empty";
    array_push($errors, "");
  } 
  else 
  {
    if (!preg_match("/^([A-Za-z0-9 .-_]).{1,}$/",$name)) 
    {
      $nameErr = "User Name must contain at least two (2) characters";
      array_push($errors, "");
    } 

    elseif (!preg_match("/^[A-Za-z0-9 .-_]*$/",$name)) 
    {
      $nameErr = "UserName can contain alpha numeric characters, period, dash or underscore only";
      array_push($errors, "");
    }
  }

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
    else
    {
      $user_check_query = "SELECT * FROM users WHERE Email='$email' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);
      
      if ($user) // if user exists
      { 
        if ($user['Email'] === $email) 
        {
          array_push($errors, "Email already exists");
        }
      }
    }
  }

  //Phone Number
  if (empty($phone)) 
  {
    $phoneErr = "Cannot be empty";
    array_push($errors, "");
  }
  else
  {
    if (!preg_match("/^([0-9]).{10}$/",$phone)) 
    {
      $phoneErr = "Must be a valid phone number with 11 digits";
      array_push($errors, "");
    }
  } 

  //Address
  if (empty($address)) 
  {
    $addressErr = "Cannot be empty";
    array_push($errors, "");
  }  
    

  if (count($errors) == 0) 
  {
    $uname = $_SESSION['uname'];
    $query = "UPDATE users SET Name='$name', Email='$email', `Phone Number`='$phone', Address='$address' WHERE UserName = '$uname'";
    if (mysqli_query($db, $query)) 
    {
      echo "Record updated successfully";
    } 
    else 
    {
      echo "Error updating record: " . mysqli_error($db);
    }
    $_SESSION['uname'] = $uname;
    header('location:dashboard.php');
  }
}

?>