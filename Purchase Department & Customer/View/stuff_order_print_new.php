<?php include('../Model/DATABASE.php') ?>
<?php
$total = 0;
$ID=0;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dealer Management System</title>
  <link rel = "icon" href = "https://icons.iconarchive.com/icons/mag1cwind0w/akisame/128/Leaf-icon.png">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Concert+One&display=swap');
*{
  font-family: 'Concert One', cursive;
  font-size: 20px;
}
</style>
</head>
<body>
<img src="../CSS/favicon.ico" alt="company" width="64px" height="64px" class="img" onClick="window.location.reload();">
<a href="dashboard.php"><h5 style="text-align: right;">&emsp;DashBoard&emsp;</h5></a>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form method="post" action="stuff_order_print_new.php">
        <h4> Order ID : </h4> <input type="number" name="id" id="id" onchange="ORDER(this.value)" autocomplete="off">
        <input type="submit" name="submit"><br>
        <p id="orderDetails"></p><br>
      </form>

      <?php
      if (isset($_POST['id'])) 
      {
      	$ID = $_POST['id'];
      }
      ?>
      
      <table class="table table-bordered print" style="font-size: 20px;">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Phone No</th>
            <th>Address</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $user_qry="SELECT `Order ID`, `Customer Name`, `Phone No`, `Address` FROM `orders` WHERE `Order ID` = '$ID'";
          $user_res=mysqli_query($db,$user_qry);
          while($user_data=mysqli_fetch_assoc($user_res))
          {
          ?>
          <tr>
            <td><?php echo $user_data['Order ID']; ?></td>
            <td><?php echo $user_data['Customer Name']; ?></td>
            <td><?php echo $user_data['Phone No']; ?></td>
            <td><?php echo $user_data['Address']; ?></td>
          </tr>
        <?php
          }
        ?>
        </tbody>
      </table>


      <table class="table table-bordered print" style="font-size: 20px;">
        <thead>
          <tr>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total Price</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $user_qry="SELECT `Item Name`, `Quantity`, `Price` FROM `orders_item` WHERE `Order ID` = '$ID'";
          $user_res=mysqli_query($db,$user_qry);
          while($user_data=mysqli_fetch_assoc($user_res))
          {
          ?>
          <tr>
            <td><?php echo $user_data['Item Name']; ?></td>
            <td><?php echo $user_data['Quantity']; ?></td>
            <td><?php echo $user_data['Price'].' TK'; ?></td>
            <td><?php echo number_format($user_data['Quantity']*$user_data['Price'], 2). ' TK'; ?></td>

          </tr>
        <?php
        $total = $total + ($user_data['Quantity']*$user_data['Price']);
          }
        ?>
        <tr>
          <td colspan = "4" align="center">Net Total : <?php echo number_format($total, 2). ' TK'; ?></td>
        </tr>
        </tbody>
      </table>

      <div class="text-center">
        <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<script>
  function ORDER(id) {
  var xhttp;
  if (id == "") {
    document.getElementById("orderDetails").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("orderDetails").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "../Controller/testOrder.php?p="+id, true);
  xhttp.send();
}
</script>