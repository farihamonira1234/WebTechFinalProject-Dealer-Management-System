<?php

	if (isset($_GET['error'])) {
		
		if($_GET['error'] == 'db_error')
		{
			echo "Something went wrong...please try again";
		}
		elseif($_GET['error'] == 'id_already_exist')
		{
			echo "this id already exist";
		}
		else
			echo "null submission";	
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>SignUp</title>
</head>
<body  style="background-color:powderblue;">

	<form action="../php/regCheck.php" method="post">
		<fieldset>
			<legend>SignUp</legend>
			<table>
				<tr>
					<td>Userid</td>
					<td><input type="text" name="id"></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Submit"></td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>