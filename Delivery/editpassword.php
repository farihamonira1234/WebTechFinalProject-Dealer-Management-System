<!DOCTYPE html>
<html>
<head>
	<title>Change password</title>
</head>
<body>

	<?php require_once 'logged.php'; ?>
	<?php require_once 'editpasscontrol.php'; ?>


	<fieldset>
		<legend>Change Password</legend>
		<form method="POST" name="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

			<?php 
    
   if (isset($error)) 
   {
      echo $error;
   }
   ?>

   <b>User Name: </b> <input type="text" name="uname" id="uname" value="<?php echo $uname; ?>">
   <span id="unameErr" class="error" >* <?php echo $unameErr;?></span> <br><hr>

   <b>Current Password: </b> <input type="password" name="password" id="password" value="<?php echo $password; ?>">
   <span id="passwordErr" class="error" >* <?php echo $passwordErr;?></span> <br><hr>

   <b>New Password: </b> <input type="password" name="npassword" id="npassword" value="<?php echo $npassword; ?>">
   <span id="npasswordErr" class="error" >* <?php echo $npasswordErr;?></span> <br><hr>

   <input type="submit" name="submit" value="submit">


   <?php
   
   if (isset($message)) {
       echo $message;
   }

    ?>
			
		</form>
	</fieldset>

</body>
</html>

<?php require_once'footer.php' ?>