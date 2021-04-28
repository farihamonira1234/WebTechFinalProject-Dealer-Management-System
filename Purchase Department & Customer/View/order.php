<?php include('../Model/DATABASE.php') ?>

<?php

session_start();
if (!isset($_SESSION['uname'])) 
{
	header('location:login.php');
}

//Getting Customer Data From Users Table
$uname = $_SESSION['uname'];
$query="SELECT `Name`, `Phone Number`, `Address` From users Where UserName='$uname' LIMIT 1";
$result1 = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result1);
if ($user) // if user exists
{
	$cname = $user['Name'];
	$cphone = $user['Phone Number'];
	$caddress = $user['Address'];
}

//Getting Last Order Id From orders Table
$sql="SELECT * From orders";
if ($result=mysqli_query($db,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  $orderId = $rowcount+1;
  // Free result set
  mysqli_free_result($result);
  }

//Inserting New Order in orders Table
$order = "INSERT INTO orders (`Order ID`, `Customer Name`, `Phone No`, Address) VALUES('$orderId', '$cname', '$cphone', '$caddress')";
mysqli_query($db, $order);

//Getting items_detail from cart Table
$cart="SELECT * From cart Where `User Name` = '$uname'";
$cart_result = mysqli_query($db, $cart);
while($cart_data=mysqli_fetch_assoc($cart_result))
{
	$itemName = $cart_data['Item Name'];
	$itemQuantity = $cart_data['Quantity'];
	$itemPrice = $cart_data['Price'];

	//Inserting Order Items in orders_item Table
	$iorder="INSERT INTO orders_item (`Order ID`, `Item Name`, `Quantity`, Price) VALUES('$orderId', '$itemName', '$itemQuantity', '$itemPrice')";
	$newOrder = mysqli_query($db, $iorder);
}
$delete = "DELETE From cart Where `User Name` = '$uname'";
$delete_cart = mysqli_query($db, $delete);
$_SESSION['order'] = "Order Taken Successfully";
header('location:cart.php');
?>