<?php  

require_once 'model.php';

$name = $email = $uname = $password = $cpassword = $gender = $dateofbirth = $message = $error= "";

  $nameErr = $emailErr = $dateofbirthErr = $genderErr = $unameErr = $passwordErr = $cpasswordErr =   "";

  
 
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    if (empty($_POST["name"])) 
    {
      $nameErr = "Name is required";
    }
    else 
    { $name = $_POST["name"];

     if (strlen($_POST["name"])<2) 
      {
      $nameErr = "Name should not be less than 2 characters";
      }
      else if (!preg_match("/^[a-zA-Z-'. ]*$/",$name)) 
      {
        $nameErr = "Only letter and white spaces are allowed";
      }
    }

    if(empty($_POST["email"]))
    {
      $emailErr = "Email is required";
    }
    else
    {
      $email = $_POST["email"];
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
      {
      $emailErr = "Invalid email format";
      }
    }

    if (empty($_POST["uname"])) 
    {
      $unameErr = "User Name is required";
    }
    else 
    { $uname = $_POST["uname"];

     if (strlen($_POST["uname"])<2) 
      {
      $unameErr = "User Name should not be less than 2 characters";
      }
    }

    if (empty($_POST["password"]))
    {
      $passwordErr = "Password is required";
    }
    else
    {
      $password = $_POST["password"];
      if (strlen($_POST["password"])<8) 
      {
        $passwordErr =  "Password must contain atleast 8 characters";
      }
    }

    if (empty($_POST["cpassword"]))
    {
      $cpasswordErr = "Confirm password is required";
    }
    else
    {
      if ($_POST["password"] != $_POST["cpassword"]) 
      {
        echo "Password didn't match";
      }
      else if($_POST["password"] = $_POST["cpassword"])
        {echo"Password set successfully";}
    }

    if (empty($_POST["gender"])) 
    {
      $genderErr = "Select a gender";
    }
    else
    {
      $gender = $_POST["gender"];
    }

    if (empty($_POST["dateofbirth"]))
     {
      $dateofbirthErr = "Date of Birth required";
     }
      else 
        {
          $dateofbirth = date('d-m-Y', strtotime($_REQUEST['dateofbirth']));
        }
      if(isset($_POST["submit"]))
      {
        if (empty($_POST["name"])) 
        {
          $nameErr = "Name is required";
        }
        if (empty($_POST["uname"])) 
        {
          $unameErr = "User Name is required";
        }
        if (empty($_POST["email"])) 
        {
          $emailErr = "Email is required";
        }
        if (empty($_POST["password"])) 
        {
          $passwordErr = "Password is required";
        }
        if (empty($_POST["cpassword"])) 
        {
          $cpasswordErr = "Confirm password is required";
        }
        if (empty($_POST["gender"])) 
        {
          $genderErr = "Gender is required";
        }
      
        else   
           {  

             
//require_once 'model.php';


if (isset($_POST['submit'])) {
  $data['name'] = $_POST['name'];
  $data['email'] = $_POST['email'];
  $data['uname'] = $_POST['uname'];
  $data['password'] = $_POST['password'];
  

  

  if (addUser($data)) {
    echo 'successfully added a new dealer!!!';
    //echo "<a href ='Login.php'>Login</a>";
  }
} else {
  echo 'You are not allowed to access this page.';
}


                
           }
}
}


  ?>