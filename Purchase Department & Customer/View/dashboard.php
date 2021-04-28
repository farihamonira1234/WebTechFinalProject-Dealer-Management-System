<?php include('../Model/DATABASE.php') ?>
<?php
	session_start(); 

	if (!isset($_SESSION['uname'])) 
	{
		$_SESSION['msg'] = "You must log in first";
		echo $_SESSION['msg'];
		header('location:login.php');
	}
	else
	{
?>
<!DOCTYPE HTML>  
<html>
<head>
  <meta charset="UTF-8">
  <title>Dealer Management System</title>
  <link rel = "icon" href = "https://icons.iconarchive.com/icons/mag1cwind0w/akisame/128/Leaf-icon.png">
  <link rel="stylesheet" type="text/css" href="../CSS/Table.css">
  <link rel="stylesheet" href="../CSS/form_style.css">
</head>
<body>
<div class="wrapper">
	<table style="width: 90%;">
		<tr>
			<td colspan="3">
			<br><img src="../CSS/favicon.ico" alt="company" width="64px" height="64px" class="img" onClick="window.location.reload();">
			<p style="text-align: right;">
			Logged in as <a href="view_profile.php"> <?php echo $_SESSION['uname'] ?> |</a>
			<a href="dashboard.php"> Dashboard  |</a>
            <a href="logout.php"> Logout  </a><br><br><br>
			</p>
			</td>
		</tr>
		<tr>
			<td style="width: 30%;">
				<p style="margin-top: auto; background: #cc99ff;"><strong> Account</strong></p>
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
				<ul>
					<li>
						<?php
								if ($row["Role"] == 'Admin') 
								{
									echo "<a href='users.php'> Check Users </a>".'<br><br>';
								}
								elseif ($row["Role"] == 'Purchase Stuff') 
								{
									echo "<a href='stuff_order_print_new.php'> Check Orders </a>".'<br><br>';

								}
								else
								{
									echo "<a href='customer_order.php'> Order Now!! </a>".'</li>';
									echo '<li>';
									echo "<a href='cart.php'> Your Cart </a>";
									echo '<li>';
									echo "<a href='order_history.php'> Your Order History </a>";
								}
							
								}
							}
						?>	
					<br><br><br>				
					</li>
				</ul>				
			</td>
			<td style="text-align: center;"><STRONG> Welcome <?php echo $_SESSION['uname'] ?></td>
			<td style="width: 30%;">
				<p style="margin-top: auto; background: #cc99ff;"><strong>Personal Informations Settings</strong></p>
				<ul>
					
					<li><a href="view_profile.php"> View Profile </a></li>
					<li><a href="edit_profile.php"> Edit Profile </a></li>
					<li><a href="change_profile_picture.php"> Change Profile Picture </a></li>
					<li><a href="change_password.php"> Change Password </a></li>
				</ul>
			</td>
		</tr>
		<tr>
			<td colspan="3"; style="text-align: center; background: #cc99ff;" >
				<?php require '../Model/footer.php';?>
			</td>
		</tr>
	</table>
</div>
</body>
</html>
<?php	
  }
?>

