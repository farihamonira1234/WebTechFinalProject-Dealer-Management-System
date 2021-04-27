<?php
	require_once('../php/session_header.php');
	require_once('../service/companyService.php');

	if (isset($_GET['id'])) {
		$company = getByID($_GET['id']);	
	}else{
		header('location: all_company.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Company Info</title>
</head>
<body style="background-color:powderblue;">

	<form action="../php/companyController.php" method="post"> <!-- enctype="multipart/form-data">-->
		<fieldset>
			<legend>Edit Company Info</legend>
			<table>
				<tr>
					<td>Company Name</td>
					<td><input type="text" name="company_name" value="<?=$company['company_name']?>"></td>
				</tr>
				<tr>
					<td>Profile Description</td>
					<td><input type="text" name="profile_description" value="<?=$company['profile_description']?>"></td>
				</tr>
				<tr>
					<td>Industry</td>
					<td><input type="text" name="industry" value="<?=$company['industry']?>"></td>
				</tr>
				<tr>
					<td>Company website</td>
					<td><input type="text" name="company_website" value="<?=$company['company_website']?>"></td>
				</tr>
				<!--<tr>
					<td>Company logo</td>
					<td><input type="file" name="company_logo" ></td>
				</tr>-->
				<tr>
					<td>User account id</td>
					<td><input type="text" name="user_account_id" value="<?=$company['user_account_id']?>"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="hidden" name="id" value="<?=$company['id']?>">
						<input type="hidden" name="company_logo" value="<?=$company['company_logo']?>">
						<input type="submit" name="edit" value="Update"> 
						<a href="all_company.php">Back</a>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>