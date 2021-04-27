<?php
	require_once('../php/session_header.php');
	require_once('../service/companyService.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title>Company List</title>
</head>
<body  style="background-color:powderblue;">

	<a href="home.php">Back</a> |
	<a href="../php/logout.php">Logout</a> 
	
	<h3>Company list</h3>

	<table border="1">
		<tr>
			<td>ID</td>
			<td>Companyname</td>
			<td>Profiledescription</td>
			<td>Industry</td>
			<td>Companywebsite</td>
			<td>Companylogo</td>
			<td>Useraccountid</td>
		</tr>

		<?php  
			$companies = getAllCompany();
			for ($i=0; $i != count($companies); $i++) {  ?>
		<tr>
			<td><?=$companies[$i]['id']?></td>
			<td><?=$companies[$i]['company_name']?></td>
			<td><?=$companies[$i]['profile_description']?></td>
			<td><?=$companies[$i]['industry']?></td>
			<td><?=$companies[$i]['company_website']?></td>
			<td><?=$companies[$i]['company_logo']?></td>
			<td><?=$companies[$i]['user_account_id']?></td>
			<td>
				<a href="editcompany.php?id=<?=$companies[$i]['id']?>">Edit</a> |
				<a href="deletecompany.php?id=<?=$companies[$i]['id']?>">Delete</a> 
			</td>
		</tr>

		<?php } ?>
		
	</table>
</body>
</html>