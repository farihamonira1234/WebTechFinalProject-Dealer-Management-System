<?php include('../Model/DATABASE.php') ?>

<?php

session_start();
if (!isset($_SESSION['uname'])) 
{
	header('location:login.php');
}
$uname = $_SESSION['uname'];
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

<?php
$total = 0;
$query="SELECT `Name` From users Where UserName='$uname' LIMIT 1";
$result1 = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result1);
if ($user) // if user exists
{
	$cname = $user['Name'];
}

$order_history="SELECT `Order ID` From orders Where `Customer Name` = '$cname'";
$order_history_result = mysqli_query($db, $order_history);
while($order_history_data=mysqli_fetch_assoc($order_history_result))
{
	$orderID = $order_history_data['Order ID'];
?>
	
	<table class="table table-bordered print" style="font-size: 20px;">
      <thead>
        <tr>
          <span style="color: #cc99ff;">Order ID : <?php echo $order_history_data['Order ID']; ?></span>
          <th>Item Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total Price</th>
        </tr>
      </thead>
      <tbody>
<?php
	$order_history_items="SELECT `Order ID`, `Item Name`, `Quantity`, `Price` From orders_item Where `Order ID` = '$orderID'";
	$order_history_items_result = mysqli_query($db, $order_history_items);
	while($order_history_items_data=mysqli_fetch_assoc($order_history_items_result))
	{
?>
	    <tr>        
        <td><?php echo $order_history_items_data['Item Name']; ?></td>
        <td><?php echo $order_history_items_data['Quantity']; ?></td>
        <td><?php echo $order_history_items_data['Price'].' TK'; ?></td>
        <td><?php echo $order_history_items_data['Quantity']*$order_history_items_data['Price']. ' TK'; ?></td>
      </tr>
<?php
        $total = $total +  ($order_history_items_data['Quantity']*$order_history_items_data['Price']);
?>
     
<?php
	}
?>
      <tr>
        <td colspan="4" style="text-align: center;">Net Total : <?php echo $total. ' TK'; ?></td>
        <?php $total = 0; ?>
      </tr>
<?php     
} 
?>
	</tbody>
    </table>
    </div>
  </div>
</div>
</body>
</html>