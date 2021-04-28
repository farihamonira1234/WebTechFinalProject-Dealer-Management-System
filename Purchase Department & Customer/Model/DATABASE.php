<?php

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');
// Check connection
if (!$db) 
{
  echo "<br>Database Not Found<br><br>";
  die("Connection failed: " . mysqli_connect_error());
}

?>