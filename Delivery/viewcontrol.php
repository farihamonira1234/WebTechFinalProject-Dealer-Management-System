<?php
 require_once'logged.php';  
if (isset($_SESSION['uname'])) {
require_once 'model.php';
$data = showData($_SESSION['ID']);

$id = $data["ID"];
$name = $data["NAME"];
$email = $data["EMAIL"];
$uname = $data["UNAME"];
}
else{
header("location:loginview.php");
}

?>
