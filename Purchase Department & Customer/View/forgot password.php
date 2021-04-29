<?php include('../Model/DATABASE.php') ?>
<?php include('../Controller/forgot_password_controller.php') ?>

<!DOCTYPE HTML>  
<html>

<head>
  <title>Dealer Management System</title>
  <link rel = "icon" href = "https://icons.iconarchive.com/icons/mag1cwind0w/akisame/128/Leaf-icon.png">
  <link rel="stylesheet" href="../CSS/form_style.css">
  <script src="../JS/form_scripts.js"></script>
  <style>
  .error {color: #FF0000;}
  </style>
</head>

<body>

<div class="wrapper">
    <img src="../CSS/favicon.ico" alt="company" width="64px" height="64px" class="img" onClick="window.location.reload();">
  <p><span class="error">* required field</span></p>

  <form method="post" action="">

    <fieldset>
    <legend><h2>FORGOT PASSWORD</h2></legend>
    <div id="error_message"></div>
    <span class="error"><?php include('../controller/errors.php'); ?></span>
    <div class="input_field">
      <input type="text" placeholder="EMAIL" name="email" id="email" onkeyup="return validateEmail()" autocomplete="off">
      <span class="error">* <?php echo $emailErr;?></span>
      <br><br>
    </div>
    </fieldset>
    <br>
    <div class="btn">
      <input type="submit" name="forgot_pass" value="Submit">
      <input type="reset" value="Reset"> <br><br>
    </div> 
  </form>

</div>

</body>
</html>
