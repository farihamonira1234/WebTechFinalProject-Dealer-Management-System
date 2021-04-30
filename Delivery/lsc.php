<?php

	$name = $_POST['name'];
	
	$conn = mysqli_connect('localhost', 'root', '', 'mydb');
	$sql = "select * from guests where uname like '%{$name}%'";
	$result = mysqli_query($conn, $sql);

	$response = "<table border=2>
					<tr>
						<td>ID</td>
						<td>Name</td>
						<td>Username</td>
						<td>Email</td>
						
					</tr>";

	while ($row = mysqli_fetch_assoc($result)) {
		$response .= "	<tr>
							<td>{$row['ID']}</td>
							<td>{$row['NAME']}</td>
							<td>{$row['UNAME']}</td>
							<td>{$row['EMAIL']}</td>
							
						</tr>";
	}

	$response .= "</table>";

	echo $response;
?>