<?php require_once 'registrationcontrol.php'?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<style>.error {color: #FF0000;}</style>

	<script type="text/javascript">
		function validateform()
    {  
      var name=document.myform.name.value;  
      var password=document.myform.password.value;  
      var email=document.myform.email.value;
      var uname=document.myform.uname.value;
      
        
      if (name==null || name==""){  
        alert("Name can't be blank");  
        return false;  
      }else if(password.length<8){  
        alert("Password must be at least 8 characters long.");  
        return false;  
      }
      else if (email==null || email=="") {
        alert("Email can not be blank");
        return false;
      }
      else if (uname==null || uname=="") {
        alert("User name can not be blank");
        return false;
      }

    }
    
    function checkName() {
  if (document.getElementById("name").value == "") {
        document.getElementById("nameErr").innerHTML = "Name can't be blank";
        document.getElementById("nameErr").style.color = "blue";
        document.getElementById("name").style.borderColor = "yellow";
  }else{
        document.getElementById("nameErr").innerHTML = "";
        document.getElementById("name").style.borderColor = "green";
  }
  
}

function checkEmail() {
   
    if (document.getElementById("email").value == "") 
    {
          document.getElementById("emailErr").innerHTML = "Email can't be blank";
          document.getElementById("emailErr").style.color = "blue";
          document.getElementById("email").style.borderColor = "yellow";
    }
   
    else
    {
        document.getElementById("emailErr").innerHTML = "";
        document.getElementById("email").style.borderColor = "green";
    }
    
  }

  function checkUsername() {
    if (document.getElementById("uname").value == "") {
          document.getElementById("unameErr").innerHTML = "Username can't be blank";
          document.getElementById("unameErr").style.color = "blue";
          document.getElementById("uname").style.borderColor = "yellow";
    }else{
          document.getElementById("unameErr").innerHTML = "";
          document.getElementById("uname").style.borderColor = "green";
    }
    
  }

    function checkPassword(){
            if (document.getElementById("password").value == "") {
                document.getElementById("passwordErr").innerHTML = "Password can't be blank";
                document.getElementById("passwordErr").style.color = "blue";
                document.getElementById("password").style.borderColor = "yellow";
            }else if(document.getElementById("password").value.length<8){
                document.getElementById("password").style.borderColor = "blue";
                document.getElementById("passwordErr").style.color = "yellow";
                document.getElementById("passwordErr").innerHTML = "Password must be at least 8 characters long.";
            }
            else{
                document.getElementById("passwordErr").innerHTML = "";
                document.getElementById("passwordErr").style.color = "red";
                document.getElementById("password").style.borderColor = "black";
            }
        }

  function checkCpassword(){
   
    if (document.getElementById("cpassword").value == "") 
    {
          document.getElementById("cpasswordErr").innerHTML = "Password can't be blank";
          document.getElementById("cpasswordErr").style.color = "blue";
          document.getElementById("cpassword").style.borderColor = "yellow";
    }
   
    else if(document.getElementById("cpassword").value != document.getElementById("password").value)
    {
        document.getElementById("cpasswordErr").innerHTML = "Does not match";
        document.getElementById("cpasswordErr").style.color = "blue";
        document.getElementById("cpassword").style.borderColor = "yellow";
    }
    else
    {
        document.getElementById("cpasswordErr").innerHTML = "";
        document.getElementById("cpassword").style.borderColor = "green";
    }
    
  }

	</script>
</head>
<body>

<?php require_once 'Welcome.php'  ?>
<fieldset>
    <legend>Registration</legend>

    <form name="myform" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="validateform()">

      <?php 
    
   if (isset($error)) 
   {
      echo $error;
   }
   ?>
    <br>

      <b>Name: &nbsp &nbsp &nbsp &nbsp &nbsp      </b> <input type="text" name="name" id="name" value="<?php echo $name;?>" onkeyup="checkName()" onblur="checkName()"  >
      <span id="nameErr" class="error" >  <?php echo $nameErr;?> </span>    <br><hr>

      <b>Email: &nbsp &nbsp &nbsp  &nbsp &nbsp    </b> <input type="text" id="email" name="email" value="<?php echo $email;?>" onkeyup="checkEmail()" onblur="checkEmail()" >
      <span id="emailErr" class="error"> <?php echo $emailErr;?></span>  <br><hr>

      <b>User Name: &nbsp                         </b> <input type="text" id="uname" name="uname" value="<?php echo $uname; ?>" onkeyup="checkUsername()" onblur="checkUsername()" >
      
      <span id="unameErr" class="error" > <?php echo $unameErr;?> </span> <br> <hr>


      <b>Password: &nbsp &nbsp                  </b> <input type="password" id="password" name="password" value="<?php echo $password; ?>" onkeyup="checkPassword()" onblur="checkPassword()">
      <span id="passwordErr" class="error" > <?php echo $passwordErr;?> </span> <br><hr>

      <b>Confirm Password: &nbsp                  </b> <input type="password" id="cpassword" name="cpassword" value="<?php echo $cpassword; ?>" onkeyup="checkCpassword()" onblur="checkCpassword()" >
      <span  id="cpasswordErr" class="error" > <?php echo $cpasswordErr;?> </span> <br><hr>

      <b>Gender: &nbsp &nbsp  &nbsp &nbsp         </b> <input type="radio" name="gender" value="Male">Male 
                                                       <input type="radio" name="gender" value="Female">Female
                                                       <input type="radio" name="gender" value="Other">Other 
                                                       <span class="error"> <?php echo $genderErr;?></span><br><hr>

      <b>Date Of Birth: </b>                           <input type="date" name="dateofbirth" value="<?php echo date('d-m-Y')?>"> <span class="error"> <?php echo $dateofbirthErr;?></span><br><hr>

                                                       <input type="submit" name="submit" value="submit">
                                                       <input type="reset" name="reset" value="reset">

 
    
     <?php
   
   if (isset($message)) {
       echo $message;
   }

    ?> 
                                                 
    </form>
  </fieldset>	

</body>
</html>

<?php  require_once'footer.php'?>

<script>
    $(document).ready(function(){
        $('#uname').keyup(function(){
            var name = $(this).val();
            $.ajax
            ({
                url: "unamecontrol.php",
                method:"POST",
                data:{my_name:name},
                dataType:"text",
                success:function(html)
                {
                    $('#unameErr').html(html);
                }
            });
        });
    });
</script>
