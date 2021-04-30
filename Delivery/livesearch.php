<?php require_once 'logged.php'; ?>


<!DOCTYPE html>
<html>
<head>
	<title>Live search</title>
	<script> 

  function ajax()
  {

	var name = document.getElementById('name').value;


	var xhttp = new XMLHttpRequest();


	xhttp.open('POST', 'lsc.php', true);

	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhttp.send('name='+name);

	xhttp.onreadystatechange = function()
	{
		if(this.readyState == 4 && this.status == 200)
		{

			document.getElementById('result').innerHTML = this.responseText;
		}
	}
   }



	</script>
</head>
<body>

	<h1>Seach</h1>
	<input type="text" name="name" id="name" onkeyup="ajax()">
	<input type="button" name="" value="click" onclick="ajax()">

	<div id="result"> </div>
</body>
</html>

<?php require_once 'footer.php'; ?>
