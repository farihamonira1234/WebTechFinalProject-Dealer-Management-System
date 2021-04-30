

<?php

 

$conn = mysqli_connect("localhost","root","","mydb");

 


if(isset($_POST["my_name"])) {
  $query = "SELECT * FROM guests WHERE uname = '" . $_POST["my_name"] . "'";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result)>0) {
      echo "<span class='status-not-available'> Username already exists.</span>";
  }else{
      echo "<span class='status-available'> Username Available.</span>";
  }
}
?>