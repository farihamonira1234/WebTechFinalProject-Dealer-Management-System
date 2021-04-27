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
	<title>Delete Company</title>
</head>
<body>

	<form action="../php/companyController.php" method="post">
		<fieldset>
			<legend>Confirmation</legend>
				Press Yes to delete this company info and press No to go back <br/>
				<input type="hidden" name="id" value="<?=$company['id']?>">
				<input type="submit" name="yes" value="yes">
				<input type="submit" name="no" value="no">
		</fieldset>
	</form>
</body>
</html>