<?php include('../Model/DATABASE.php') ?>
<?php
	session_start(); 

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
  <style>
      .container 
      {
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .image 
      {
      	align-items: right;
      	text-align: right;
        flex-basis: 50%
      }
    </style>
</head>
<body>
<div class="wrapper">
<table style="width: 95%;">
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
			<fieldset>
				<legend>PROFILE</legend>
				<div class="container">
					<div>

			        <?php						
			              echo "Name : " . $row["Name"]. "<hr>";
			              echo "Email : " . $row["Email"]. "<hr>";
			              echo "Phone : " . $row["Phone Number"]. "<hr>";
			              echo "Address : " . $row["Address"]. "<hr>";
					?>
				        <a href="edit_profile.php"> Edit Profile </a>
					</div>
					<div class="image">
					<?php
				            echo "<img src='../Controller/uploads/".$row['Image']."'height=150 width=180 >";
					       }
					    } 
					?>
					<div>
						<a href="change_profile_picture.php">&emsp;Change&emsp;</a>
					</div>
					</div>
				</div>
			</fieldset>
		</td>
		<td style="width: 5%;">
			<p style="background: #cc99ff;"><strong>Personal Informations Settings</strong></p>
			<ul>
				<li style="color: #cc99ff;"><a href="view_profile.php"> View Profile </a></li>
				<li><a href="edit_profile.php"> Edit Profile </a></li>
				<li><a href="change_profile_picture.php"> Change Profile Picture </a></li>
				<li><a href="change_password.php"> Change Password </a></li>
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


