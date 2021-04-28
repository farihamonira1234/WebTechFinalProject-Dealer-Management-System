<?php

require_once '../Model/DATABASE.php';

session_start();

$message = "";
$name = $uname = $email = $phone = $address = $pass = $cpass = $image = "";
$nameErr = $unameErr = $emailErr = $phoneErr = $addressErr = $passErr = $cpassErr = $imageErr = "";
$errors = array();

// REGISTER USER
if (isset($_POST['reg_user'])) 
{
  // receive all input values from the form
  $role = mysqli_real_escape_string($db, $_POST['role']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $uname = strtoupper(mysqli_real_escape_string($db, $_POST['uname']));
  $email = strtoupper(mysqli_real_escape_string($db, $_POST['email']));
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $pass = mysqli_real_escape_string($db, $_POST['pass']);
  $cpass = mysqli_real_escape_string($db, $_POST['cpass']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

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

  //User Name
  if (empty($uname)) 
  {
    $unameErr = "Cannot be empty";
    array_push($errors, "");
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

  //Password
  if (empty($pass)) 
  {
    $passErr = "Cannot be empty";
    array_push($errors, "");
  }
  else
  {
    if (!preg_match("/^([A-Za-z0-9 .-_]).{7,}$/",$pass)) 
    {
      $passErr = "Password must not be less than eight (8) characters";
      array_push($errors, "");
    }

    elseif (!preg_match("/^(?=.*?[#?!@$%^&*-]).{1,}$/", $pass)) 
    {
      $passErr = "Password must contain at least one of the special characters (@, #, $, %)";
      array_push($errors, "");
    }   
  }

  //Confirm Password
  if ($pass != $cpass) 
  {
    $cpassErr = "Confirm Password Not Matched";
    array_push($errors, "");
  }

  //Image
  $target_dir = "../Controller/uploads/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
  {
    $imageErr = "Picture format must be in jpeg or jpg or png"; echo "<br>";
    array_push($errors, "");
    $uploadOk = 0;
  }

  if ($_FILES["image"]["size"] > 5000000) 
  {
    $imageErr = "Picture size should not be more than 5MB"; echo "<br>";
    array_push($errors, "");
    $uploadOk = 0;
  }

  if ($uploadOk == 0) 
  {
    $imageErr = "Sorry, your picture was not uploaded. Choose a different picture"; echo "<br>";
    array_push($errors, "");
  } 
  else 
  {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
    {
      $imageErr = "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
      $image = $_FILES['image']['name'];
    } 
    else 
    {
      $imageErr = "Sorry, there was an error uploading your file."; echo "<br>";
      array_push($errors, "");
    }
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE UserName='$uname' OR Email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) // if user exists
  { 
    if ($user['UserName'] === $uname) 
    {
      array_push($errors, "Username already exists");
    }

    if ($user['Email'] === $email) 
    {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
    //encrypt the password before saving in the database
  	$pass = md5($pass);
    echo "$pass";

  	$query = "INSERT INTO users (Role, Name, UserName, Email, `Phone Number`, Address, Password, Image) 
  			  VALUES('$role', '$name', '$uname', '$email', '$phone', '$address', '$pass', '$image')";
  	mysqli_query($db, $query);
  	$_SESSION['uname'] = $uname;
  	header('location:login.php');
  }
}