<?php
	
	$baksh="";
	$err_bkash="";

	$nagad="";
	$err_nagad="";


	$has_error=False;

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{	
		   if (empty($_POST["bkash"]))
			{	
				$err_bkash="* Baksh Number Requried";
				$has_error=True;

			}
		   elseif (!ctype_digit($_POST["bkash"]))
		 	{

   			 $err_bkash= "* Bkash Only Contain number";
   			 $has_error=True;

			}
			elseif (strpos($_POST["bkash"],"  "))
			{
				$err_bkash="*space is not allowed";
				$has_error=True;
			}
			
			else
			{
				$bkash=htmlspecialchars($_POST["baksh"]);

			}


			 if (empty($_POST["nagad"]))
			{	
				$err_nagad="* nagad Number Requried";
				$has_error=True;

			}


			elseif (!ctype_digit($_POST["nagad"]))
		 	{
   			    $err_nagad= "* nagad Only Contain number";
   			    $has_error=True;
			}
			elseif (strpos($_POST["nagad"],"  "))
			{
				$err_nagad="*space is not allowed";
				$has_error=True;
			}
			else
			{
				$nagad=htmlspecialchars($_POST["nagad"]);

			}









	}




  ?>


<!DOCTYPE html>
<html>
<head>
	<title>Payment Method</title>
	<link rel="stylesheet" href="paymentss.css">

	<script>
		
		function text(x)
		{
			if (x==0)
			{
				document.getElementById("bkash").style.display="block";
				document.getElementById("nagad").style.display = "none";
				
				

			}
			else
			{
				document.getElementById("nagad").style.display = "block";
				document.getElementById("bkash").style.display="none";
				

			}
			return;



		}
		
		

		
	</script>
</head>
<body id="bd">

	<style >


	</style>

<form action="" method="post">
<div class="frmdesign" id="frmd">
	
	<label>Enter Your Name</label><br>
	<input type="text" name="" class="in"> <br><br>

	<label>Select Your Payment Method</label> <br>
	<input type="radio" id="male" name="gender" value="male" onclick="text(0)" checked=""> Bkash <br>
	<input type="radio" id="male" name="gender" value="Female" onclick="text(1)"> Nagad <br> <br>



	<div id="bkash">
		
		<label>Enter Your Bkash Number</label> <br>
		<input type="text" name="bkash" class="in" value="<?php echo $baksh ; ?>"> <br>
		<span style="color: red;"><?php echo $err_bkash;?></span> <br>


	</div><br>


	<div id="nagad">
		
		<label>Enter Your Nagad Number</label> <br>
		<input type="text" name="nagad" class="in" value="<?php echo $nagad ; ?>"> <br>
		<span style="color: red;"><?php echo $err_nagad;?></span> <br>


	</div> <br>




	<div >
		<input type="submit" name="" value="Pay" class="btn">
                <button type="reset" onclick="location.href='welcome.php'" class="backhome">Return Back Home</button
	</div>












</div>












</form>




</body>
</html>