<?php
session_start();
if($_SESSION['username'])
{
}
else
{
  header('location:signin.php');
}
  ?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">Welcome Home </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="add_product.php">Add product <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="storedata.php">Product List</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="sellproduct.php">Sell Product</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="payment.php">Payment</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="complain.php">Complain</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><?php echo ($_SESSION ['username']);?></button>
   </form>
   
  </div>
</nav>
<button> <a href="logout.php"> Log out</a> </button>

</body>
</html>