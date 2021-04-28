<?php include('../Model/DATABASE.php') ?>
<?php include('../Controller/change_password_controller.php') ?>
<?php

  if (!isset($_SESSION['uname'])) 
  {
    $_SESSION['msg'] = "You must log in first";
    echo $_SESSION['msg'];
    header('location:login.php');
  }
  
?>

<!DOCTYPE HTML>  
<html>
<head>
  <title>Dealer Management System</title>
  <link rel = "icon" href = "https://icons.iconarchive.com/icons/mag1cwind0w/akisame/128/Leaf-icon.png">
  <link rel="stylesheet" type="text/css" href="../CSS/Table.css">
  <link rel="stylesheet" href="../CSS/form_style.css">
  <script src="../JS/form_scripts.js"></script> 
  <style type="text/css">
    .error{color: red;}
  </style>
</head>
<body>
<div class="wrapper">
  <table style="width: 90%;">

    <tr>
      <td colspan="2">
      <br><img src="../CSS/favicon.ico" alt="company" width="64px" height="64px" class="img" onClick="window.location.reload();">
      <p style="text-align: right;">
      Logged in as <a href="view_profile.php"> <?php echo $_SESSION['uname'] ?> |</a>
      <a href="dashboard.php"> Dashboard  |</a>
            <a href="logout.php"> Logout  </a><br><br><br>
      </p>
      </td>
    </tr>

    <tr>
      <td style="width: 70%; padding-left: 5%; padding-right: 5%; padding-bottom: 10px;">
        <form method="post" action="">

          <fieldset>
          <div id="error_message"></div>
            <legend><strong>CHANGE PASSWORD</strong></legend>
            <div class="input_field">
              <input type="password" placeholder="CURRENT PASSWORD" name="crpass" id="pass" onkeyup="return validatePass()">
              <span class="error">* <?php echo $crpassErr;?></span>
            </div>
            <div class="input_field">
              <input type="password" placeholder="NEW PASSWORD" name="npass">
              <span class="error">* <?php echo $npassErr;?></span>
            </div>
            <div class="input_field">
              <input type="password" placeholder="RETYPE PASSWORD" name="rnpass" id="cpass" onkeyup="return validateCpass()">
              <span class="error">* <?php echo $rnpassErr;?></span>
            </div>
          </fieldset>

          <div class="btn">
            <input type="submit" name="change_pass" value="Submit">
          </div>
        </form>
      </td>
    <td style="width: 10%;">
      <p style="background: #cc99ff;"><strong>Personal Informations Settings</strong></p>
      <ul>
        
        <li><a href="view_profile.php"> View Profile </a></li>
        <li><a href="edit_profile.php"> Edit Profile </a></li>
        <li><a href="change_profile_picture.php"> Change Profile Picture </a></li>
        <li style="color: #cc99ff;"><a href="change_password.php"> Change Password </a></li>
        <br><br><br><br><br><br>
      </ul>
    </td>
    </tr>
    <tr>
      <td colspan="2"; style="text-align: center; background: #cc99ff;" >
        <?php require '../Model/footer.php';?>
      </td>
    </tr>
  </table>
</div>
</body>
</html>


