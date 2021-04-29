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
      <br><h4 style="text-align: center; color: #cc99ff;">Order Items</h4><br>
      <table class="table table-bordered print" style="font-size: 20px;">
      <thead>
        <tr>
          <th>Item ID</th>
          <th>Item Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Add</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $user_qry="SELECT * From items";
        $user_res=mysqli_query($db,$user_qry);
        while($user_data=mysqli_fetch_assoc($user_res))
        {
        ?>
        <tr>
          <td><?php echo $user_data['Item ID']; ?></td>
          <td><?php echo $user_data['Item Name']; ?></td>
          <td><?php echo $user_data['Price'].' TK'; ?></td>
          <td>
          	<form method="post" action="../Controller/order_controller.php">
              <input type="hidden" name="uname" id="uname" value="<?php echo $uname; ?>">
              <input type="hidden" name="itemName" id="itemName" value="<?php echo $user_data['Item Name']; ?>">
          		<input type="number" name="itemQuantity" id="itemQuantity" placeholder="Quantity">
              <input type="hidden" name="itemPrice" id="itemPrice" value="<?php echo $user_data['Price']; ?>">
          </td>
          <td> 
          		<input type="submit" name="order" value="Add To Cart" style="background-color: #cc99ff;">
          	</form>
          </td>
        </tr>
      <?php
        }
      ?>
        <tr>
          <td colspan="5" style="text-align: center;"><a href="cart.php" style=" color: #cc99ff;">Go To Cart</a></td>
        </tr>
      </tbody>
      </table>
      <?php
      $user_qry="SELECT * From orders";
        $user_res=mysqli_query($db,$user_qry);
        while($user_data=mysqli_fetch_assoc($user_res))
        {
          //echo $user_data['Order ID'].' ';
        }
      ?>
    </div>
  </div>
</div>
</body>
</html>