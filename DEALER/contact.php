<?php

$err1="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
  {

$fullname=$_POST['fullname'];
$email= $_POST['email'];
$message= $_POST ['message'];


if ($fullname=="" or  $email=="" or $message="")
{

   echo "<span>Enter All Of The fields</span>";
  
}
elseif(strlen($fullname)<3 or (strlen ($fullname)>20))
{
    echo "<span> Full name must be more than 6 Charcter <span>";  
}

elseif(strlen($_POST["email"])<6)
{
    echo "<span> Enter Your Email </span>";
}
else if (strlen($message)<0)
{
  echo "<span> Write Your Message </span>";

}
else
{
  include_once ('dbconnection.php');
  $conn=connection();
  $sql= "INSERT INTO `contact`(`id`, `fullname`, `email`, `message`) VALUES ('','$fullname','$email','$message')";

if ( $conn -> query($sql))
{
  echo "<b> Data inset Sucefully </b>";
}
else
{
  "Error";
}

}



}



  ?>

<style >
body
{
  background-image: url("image/contact.jpg");
  background-repeat: no-repeat;
  background-size: cover;
}
.frmdesign
{
    position: fixed; 
    border-style: solid;
    height: 260px;
    width: 450px;
    text-align: center;
    padding-top: 10px;
    padding-bottom: 60px;
    top: 20%;
    left: 35%;
    border-radius: 10px;
    background-color: white;
    font-size: 16px;
    padding-top: 50px;

}
.in
{
  padding: 5px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  width: 70%;
}
.btn
{
    background-color: white;
    width: 40%;
    border-radius: 5px;
    height: 25px;
}
.btn:hover
{
    background-color:gray;
    cursor: pointer;
}
span
{
  box-sizing: border-box;
  color: red;
  background-color: black;
  width: 100vw;
  padding: 20px 80px;
  margin-left: 40%;
}
b
{
  box-sizing: border-box;
  color: green;
  background-color: white;
  width: 100vw;
  padding: 20px 80px;
  margin-left: 40%;

}
.backhome
{
  background-color: black;
  color: white;
}
</style>


<!DOCTYPE html>
<html>
<head>
  <title>Contact With us </title>
</head>
<body>

  <form action="" method="post" class="frmdesign">
    <label>Name</label><br>
    <input type="text" name="fullname" class="in"> <br>

    <label>Email</label> <br>
    <input type="text" name="email" class="in"> <br>

    <label>Write Your Message</label> <br>

    <textarea class="txtarea" rows="4" cols="50" name="message" > </textarea> <br> <br>

    <input type="submit" name="submit" class="btn" value="Connect With us"> <br> <br>

    <button type="reset" onclick="location.href='index.php'" class="backhome">Return Back Home</button>

  </form>

</body>
</html