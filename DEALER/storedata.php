<style >

body
{
	background-image: url('image/storedata.png');
    background-repeat: no-repeat;
    background-size: cover;
}

table
{
   table-layout: fixed;
   width: 85%;
   border-collapse: collapse;
   border: 3px solid purple;
   text-align: center;
   margin-left:auto; 
   margin-right:auto;
   position: absolute;
   top: 43%;
   left: 7%;

}
	



</style>




<?php
	include ("dbconnection.php");
  $conn=connection();
	$in=mysqli_query ($conn,"SELECT* from addproduct ORDER by id DESC ");
  ?>

  <!DOCTYPE html>
  <html>
  <head>
  	<title>Tabel View</title>
  </head>
  <body>



  	<table border="1" style="align-items: center; ">

  		<tr>
  			<th style="background-color:#7dcea0">id</th>
  			<th style="background-color: #d4efdf">pname</th>
  			<th style="background-color:#7dcea0">pquantity</th>
  			<th style="background-color: #d4efdf">pcost</th>
  			<th style="background-color:#7dcea0">description</th>
  			<th style="background-color:#7dcea0">Update</th>
  		</tr>
  		<?php

  		while ($res=mysqli_fetch_array($in))
  		{
  			echo '<tr>';
  			echo "<td bgcolor='#d4efdf'>".$res['id'].'</td>';
  			echo "<td bgcolor='#7dcea0'>".$res['pname'].'</td>';
  			echo "<td bgcolor='#d4efdf'>".$res['pquantity'].'</td>';
  			echo "<td bgcolor='#7dcea0'>".$res['pcost'].'</td>';
  			echo "<td bgcolor='#d4efdf'>".$res['description'].'</td>';
  			echo "<td bgcolor='#fef9e7'><a href='profile_update.php?id=$res[id]'><font color='black'>Edit</a>";
  			echo "</tr>";
  		}
  		  ?>
  		
  	</table>

          <button type="reset" onclick="location.href='welcome.php'" class="backhome">Return Back Home</button

  </body>
  </html>