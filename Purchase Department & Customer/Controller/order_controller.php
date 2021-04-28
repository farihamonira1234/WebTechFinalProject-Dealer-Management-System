<?php  

function db_conn()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    try 
    {
        $conn = new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset=utf8', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        // var_dump($conn) ;
    } 
    catch (PDOException $e) 
    {
        echo $e->getMessage();
    }
    return $conn;
}

function addToCart($data)
{
	$conn = db_conn();
    $selectQuery = "INSERT into cart (`User Name`, `Item Name`, Quantity, Price, `Total Price`)
    VALUES (:uname, :itemName, :itemQuantity, :itemPrice, :totalPrice)";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':uname' 		=> $data['uname'],
        	':itemName' 	=> $data['itemName'],
        	':itemQuantity' => $data['itemQuantity'],
        	':itemPrice' 	=> $data['itemPrice'],
        	':totalPrice'	=> $data['totalPrice']
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

if (isset($_POST['order'])) 
{
	$data['uname'] 		  = $_POST['uname'];
	$data['itemName']	  = $_POST['itemName'];
	$data['itemQuantity'] = $_POST['itemQuantity'];
	$data['itemPrice']	  = $_POST['itemPrice'];
	$data['totalPrice']   = $_POST['itemQuantity']*$_POST['itemPrice'];

	if (addToCart($data)) 
	{
	  	echo 'Successfully added to cart!!';
	  	header('location:../View/cart.php');
	}
}
//echo '<pre>'; print_r($data); echo '</pre>';
else 
{
	echo 'You are not allowed to access this page.';
}
?>