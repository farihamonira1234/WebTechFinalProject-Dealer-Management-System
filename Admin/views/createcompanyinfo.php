<?php
	require_once('../php/session_header.php');
	if (isset($_GET['error'])) 
	{
		if($_GET['error'] == 'db_error')
		{
			echo "Something went wrong...please try again";
		}
		elseif ($_GET['error'] == 'null_error')
		{
			echo "null submission...please try again";
		}
		elseif($_GET['error'] == 'id_already_exist')
		{
			echo "this id already exist";
		}
		elseif($_GET['error'] == 'img_error')
		{
			echo "file you uploaded is not an image file";
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add company info</title>
</head>
<body  style="background-color:powderblue;">

	<form action="../php/companyController.php" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>Create New Company Info</legend>
			<table>
				<tr>
					<td>Company id</td>
					<td><input type="text" name="id"></td>
				</tr>
				<tr>
					<td>Company name</td>
					<td><input type="text" name="company_name"></td>
				</tr>
				<tr>
					<td>Profile description</td>
					<td><input type="text" name="profile_description"></td>
				</tr>
				<tr>
					<td>Industry</td>
					<td><input type="text" name="industry"></td>
				</tr>
				<tr>
					<td>Company website</td>
					<td><input type="text" name="company_website"></td>
				</tr>
				<tr>
					<td>Company logo</td>
					<td><input type="file" name="company_logo"></td>
				</tr>
				<tr>
					<td>User account id</td>
					<td><input type="text" name="user_account_id"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="create" value="Create"> 
						<a href="home.php">Back</a>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>