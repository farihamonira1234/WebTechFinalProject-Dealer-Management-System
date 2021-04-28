<?php

if (removeOrder($_GET['id'])) 
{
    header('location:../View/cart.php');
}

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

function removeOrder($id)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM `cart` WHERE `ID` = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

?>