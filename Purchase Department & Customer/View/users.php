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

<table class="table table-bordered print" style="font-size: 20px;">

    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Role</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Address</th>
      </tr>
    </thead>

<?php

$users="SELECT `Name`, `Role`, `UserName`, `Email`, `Phone Number`, `Address`, `Image` From users";
$users_result = mysqli_query($db, $users);
while($users_data=mysqli_fetch_assoc($users_result))
{
?>
  <tbody>
  <tr>              
    <td><?php echo "<img src='../Controller/uploads/".$users_data['Image']."'height=150 width=180'"; ?></td>
    <td><?php echo $users_data['Name']; ?></td>
    <td><?php echo $users_data['Role']; ?></td>
    <td><?php echo $users_data['UserName']; ?></td>
    <td><?php echo $users_data['Email']; ?></td>
    <td><?php echo $users_data['Phone Number']; ?></td>
    <td><?php echo $users_data['Address']; ?></td>
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