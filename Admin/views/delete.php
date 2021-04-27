<?php
	require_once('../php/session_header.php');
	require_once('../service/userService.php');

	if (isset($_GET['id'])) {
		$user = getByID($_GET['id']);	
	}else{
		header('location: all_users.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete user</title>
</head>
<body style="background-color:powderblue;">

	<form action="../php/userController.php" method="post">
		<fieldset>
			<legend>Confirmation</legend>
				Press Yes to delete this user and press No to go back <br/>
				<input type="hidden" name="id" value="<?=$user['id']?>">
				<input type="submit" name="yes" value="yes">
				<input type="submit" name="no" value="no">
		</fieldset>
	</form>
</body>
</html>