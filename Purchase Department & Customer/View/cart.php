<?php include('../Model/DATABASE.php') ?>
<?php

session_start();
if (!isset($_SESSION['uname'])) 
{
	header('location:login.php');
}
$uname=$_SESSION['uname'];

?>
<!DOCTYPE html>
<html>
<head>
  <title>Dealer Management System</title>
  <link rel = "icon" href = "https://icons.iconarchive.com/icons/mag1cwind0w/akisame/128/Leaf-icon.png">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Concert+One&display=swap');
*{
  font-family: 'Concert One', cursive;
  font-size: 20px;
}
</style>
<body>
<img src="../CSS/favicon.ico" alt="company" width="64px" height="64px" class="img" onClick="window.location.reload();">
<a href="dashboard.php"><h5 style="text-align: right; color: #cc99ff;">&emsp;DashBoard&emsp;</h5></a>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <br><h4 style="text-align: center; color: #cc99ff;">Your Cart</h4><br>
	    <?php if (isset($_SESSION['order'])) : ?>
	        <h3 style="text-align: center; color: #cc99ff">
	          <?php 
	            echo $_SESSION['order']; 
	            unset($_SESSION['order']);
	          ?>
	        </h3>
	    <?php endif ?>
      <table class="table table-bordered print" style="font-size: 20px;">
      <thead>
        <tr>
          <th>Id</th>
          <th>Item Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total Price</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $user_qry="SELECT * From cart Where `User Name` = '$uname'";
        $user_res=mysqli_query($db,$user_qry);
        while($user_data=mysqli_fetch_assoc($user_res))
        {
        ?>
        <tr>
          <td><?php echo $user_data['Id']; ?></td> 
          <td><?php echo $user_data['Item Name']; ?></td>          
          <td><?php echo $user_data['Quantity']; ?></td>
          <td><?php echo $user_data['Price'].' TK'; ?></td>
          <td><?php echo $user_data['Total Price'].' TK'; ?></td>
          <td><a href="../Controller/remove_order_controller.php?id=<?php echo $user_data['Id'] ?>" style="color: #cc99ff">Remove</a></td>
        </tr>
      <?php
        }
      ?>
      <tr>
          <td colspan="6"></td>
        </tr>
        <tr>
          <td colspan="6" style="text-align: center;"><a href="customer_order.php" style="color: #cc99ff;">Available Items</a></td>
        </tr>
        <tr>
          <td colspan="6" style="text-align: center;"><a href="order.php" style="color: #cc99ff;">Confirm Order</a></td>
        </tr>
        <tr>
          <td colspan="6" style="text-align: center;"><a href="order_history.php" style="color: #cc99ff;">Order History</a></td>
        </tr>
      </tbody>
      </table> 

    </div>
  </div>
</div>
</body>
</html>