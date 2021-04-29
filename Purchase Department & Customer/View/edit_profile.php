<?php include('../Model/DATABASE.php') ?>
<?php include('../Controller/edit_controller.php') ?>

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
        <?php 
          $uname = $_SESSION['uname'];
              $sql = "SELECT * FROM users WHERE UserName='$uname'";
              $result = mysqli_query($db, $sql);

              if (mysqli_num_rows($result) > 0) 
              {
                 while($row = mysqli_fetch_assoc($result)) 
                 { 
                  echo $row["Role"];
          ?>
          <p style="text-align: right;">
      Logged in as <a href="view_profile.php"> <?php echo $_SESSION['uname'] ?> |</a>
      <a href="dashboard.php"> Dashboard  |</a>
            <a href="logout.php"> Logout  </a><br><br><br>
      </p>
      </td>
    </tr>

    <tr>
      <td style="width: 70%; padding-left: 5%; padding-right: 5%; padding-bottom: 10px;">

      <p><span class="error">* required field</span></p>
      <form method="post" action="">
        <fieldset>
          <legend><strong>EDIT PROFILE</strong></legend>
          <div id="error_message"></div>
          <span class="error"><?php include('../controller/errors.php'); ?></span>
          <div class="input_field">
            <input type="text" placeholder="NAME" name="name" id="name" onkeyup="return validateName()" value="<?php echo $row["Name"]; ?>" autocomplete="off">
            <span class="error">* <?php echo $nameErr;?></span>
          </div>
          <div class="input_field">
            <input type="text" placeholder="EMAIL" name="email" id="email" onkeyup="return validateEmail()" value="<?php echo $row["Email"]; ?>" autocomplete="off">
            <span class="error">* <?php echo $emailErr;?></span>
          </div>  
          <div class="input_field">
            <input type="text" placeholder="PHONE" name="phone" id="phone" onkeyup="return validatePhone()" value="<?php echo $row["Phone Number"]; ?>" autocomplete="off">
            <span class="error">* <?php echo $phoneErr;?></span>
          </div> 
          <div class="input_field">
            <input type="text" placeholder="ADDRESS" name="address" id="address" onkeyup="return validateAddress()" value="<?php echo $row["Address"]; ?>" autocomplete="off">
            <span class="error">* <?php echo $addressErr;?></span>
          </div>   
            <?php            
                     }
                  } 
            ?>
        </fieldset>
      
          <div class="btn">
            <input type="submit" name="edit_user" value="Submit">
          </div> 
      </form>
            </td>
    <td style="width: 5%;">
      <p style="background: #cc99ff;"><strong>Personal Informations Settings</strong></p>
      <ul>
        
        <li><a href="view_profile.php"> View Profile </a></li>
        <li style="color: #cc99ff;"><a href="edit_profile.php"> Edit Profile </a></li>
        <li><a href="change_profile_picture.php"> Change Profile Picture </a></li>
        <li><a href="change_password.php"> Change Password </a></li>
        <br><br><br><br><br><br><br><br><br><br>
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