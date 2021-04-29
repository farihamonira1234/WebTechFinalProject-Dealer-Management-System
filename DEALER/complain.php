<?php


$databasehost="localhost";
	$databasename="nobita";

	$databaseuser="root";
	$databasepassword="";

	$result = mysqli_connect( $databasehost,$databaseuser, $databasepassword, $databasename);


if (isset($_POST['fname']) && isset($_POST['email']) && isset($_POST['address']))
      {


        $fname=$_POST['fname'];
        $email=$_POST['email'];
        $address=$_POST['address'];
$result1=mysqli_query($result,"INSERT INTO `complain`(`id`, `name`, `email`, `address`) VALUES (NULL,'$fname','$email','$address') ");


      if ($result1==true)
      {
        echo "<b>sucessfull Save TO the Database</b>";

      }
      else
      {
        echo "Errrrror";
      }
}

?>
<script>

  function validate(){
  var fname = document.getElementById("fname").value;
  var email = document.getElementById("email").value;
  var subject = document.getElementById("subject").value;
  var address = document.getElementById("address").value;
  var error_message = document.getElementById("error_message");
  
  error_message.style.padding = "10px";
  
  var text;

  if(fname.length < 5)
  {
    text = "Please Enter valid Name";
    error_message.innerHTML = text;
    return false;
  }
  if(email.indexOf("@") == -1 || email.length < 6)
  {
    text = "Please Enter valid Email";
    error_message.innerHTML = text;
    return false;
  }
  if(subject.length < 10)
  {
    text = "Please Enter Correct Subject";
    error_message.innerHTML = text;
    return false;
  }
  
  if(address.length <= 10)
  {
    text = "write more than 10 chacrter in complain box";
    error_message.innerHTML = text;
    return false;
  }
  alert("Form Submitted Successfully!");
  return true;
}


  



</script>





<style>

body
{
   background-image: url("image/cmp.jpg");
   background-repeat: no-repeat;
   background-size: cover;
}

 

</style>



  <!DOCTYPE html>
  <html>
  <head>
  	<title>Complain</title>
<link rel="stylesheet"
 href="complaincss.css">
  </head>

  <body>


  	<form method="post" onsubmit="return validate();" >
  		
  		<div class="frmdesign">

        
      <div id="error_message"></div>

      <h2>Complain Form</h2>

  		<label>Name</label> <br>
  		<input type="text" id="fname"  placeholder="Enter Your Name" name="fname" class="in"> <br><br>
  		


  		<label style="color: black;">Email</label> <br>
  		<input type="email" id="email"  placeholder="Enter Your Email" class="in" name="email"> <br><br>


    
  		

  		<label style="color: black;">Write Your Complain</label>
  		<textarea class="txtarea" rows="4" cols="50"  id="address" name="address"> </textarea> <br> <br>
  		


  		<input type="submit" name="submit" value="Complain" class="btn">
                <button type="reset" onclick="location.href='welcome.php'" class="backhome">Return Back Home</button
 		

  		</div>

  	</form>



  </body>
  </html>