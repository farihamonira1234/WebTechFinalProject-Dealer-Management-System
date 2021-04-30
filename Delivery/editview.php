<?php require_once 'editcontrol.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Profile</title>
      <style>.error {color: #FF0000;}</style>
      <script>

        function validateform(){  
      var name=document.myform.name.value;  
    
      var email=document.myform.email.value;
      var uname=document.myform.uname.value;
      
        
      if (name==null || name==""){  
        alert("Name can't be blank");  
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
        document.getElementById("nameErr").style.color = "red";
        document.getElementById("name").style.borderColor = "red";
  }else{
        document.getElementById("nameErr").innerHTML = "";
        document.getElementById("name").style.borderColor = "green";
  }
  
}
function checkEmail() {
   
    if (document.getElementById("email").value == "") 
    {
          document.getElementById("emailErr").innerHTML = "Email can't be blank";
          document.getElementById("emailErr").style.color = "red";
          document.getElementById("email").style.borderColor = "red";
    }
   
    else if(!isEmail(document.getElementById("email").value))
    {
        document.getElementById("emailErr").innerHTML = "Invaild mail";
        document.getElementById("emailErr").style.color = "red";
        document.getElementById("email").style.borderColor = "red";
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
          document.getElementById("unameErr").style.color = "red";
          document.getElementById("uname").style.borderColor = "red";
    }else{
          document.getElementById("unameErr").innerHTML = "";
          document.getElementById("uname").style.borderColor = "green";
    }
    
  }

      </script>

</head>
<body>

  <fieldset>
    <legend>Edit Profile</legend>

    <form method="POST" name="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="validateform()">

      <?php 
    
   if (isset($error)) 
   {
      echo $error;
   }
   ?> <br>

      <b>Name: &nbsp &nbsp &nbsp &nbsp &nbsp      </b> <input type="text" name="name" id="name" value="<?php echo $name;?>" onkeyup="checkName()" onblur="checkName()">
      <span  id="nameErr" class="error">* <?php echo $nameErr;?></span>    <br><hr>
      <b>Email: &nbsp &nbsp &nbsp  &nbsp &nbsp    </b> <input type="text" name="email" id="email" value="<?php echo $email;?>" onkeyup="checkEmail()" onblur="checkEmail()"  >
      <span id="emailErr" class="error" >* <?php echo $emailErr;?></span>  <br><hr>
      <b>User Name: &nbsp                         </b> <input type="text" name="uname" id="uname" value="<?php echo $uname; ?>" onkeyup="checkUsername()" onblur="checkUsername()" >
      <span id="unameErr" class="error" >* <?php echo $unameErr;?></span> <br><hr>
                         
      
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
<?php require'footer.php' ?>

