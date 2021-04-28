<?php

require_once '../Model/DATABASE.php';

session_start();

$message = "";
$image = "";
$imageErr  = "";
$errors = array();

// CHANGE PROFILE PICTURE
if (isset($_POST['change_pp'])) 
{
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

  if (count($errors) == 0) 
  {
    $uname = $_SESSION['uname'];
    $query = "UPDATE users SET Image='$image' WHERE UserName = '$uname'";
    if (mysqli_query($db, $query)) 
    {
      echo "Profile Picture Changed successfully";
    } 
    else 
    {
      echo "Error Changing Profile Picture: " . mysqli_error($db);
    }
    $_SESSION['uname'] = $uname;
    header('location:dashboard.php');
  }
}

?>