<?php 

session_start();
//include 'model.php';
require_once 'model.php';

$uname = $password = " ";
$unameErr = $passwordErr = " ";




if (isset($_POST['uname'])) 
   {
        $data = searchUser($_POST['uname']);
        if($data != null)
        {
            $uname = $data['UNAME'];
            $pass = $data['PASSWORD'];
            $id = $data['ID'];
        

            if ($_POST['uname']==$uname && $_POST['password']==$pass) 
            {
                $_SESSION['uname'] = $uname;
                $_SESSION['ID'] = $id;
                header("location:dashboardcontrol.php");
            }

        }

    }
   if (isset($_POST['uname']))
    {
        if (empty($_POST['uname'])) 
        {
            $unameErr = "user name is required";
        }
        else if (empty($_POST['password']))
        {
            $passwordErr = "password is required";
        }
        else
        {
            echo "User Name or Password invalid";
        }
    }




?>