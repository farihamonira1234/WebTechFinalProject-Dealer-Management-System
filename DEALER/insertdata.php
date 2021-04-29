<?php

$fullname=$_POST['fullname'];
$email= $_POST['email'];
$message= $_POST ['message'];

if ($fullname=="" or  $email=="" or $message="")
{
    echo "Fill All the empty field";
}
elseif(strlen($_POST["fullname"])<6)
{
    echo "Full name must be more than 6 Charcter";

}

elseif(strlen($_POST["email"])<6)
{
    echo "Enter Your Email";
}







  ?>