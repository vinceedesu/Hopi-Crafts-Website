<?php

$host = "localhost";
$dbname = "hopi_db";
$username = "root";
$password = "";
     

$conn = new PDO("mysql:host=$host;
                dbname=$dbname", 
                $username, 
                $password);

const FETCH_ASSOC = 2;

if (!$conn) {
    die("Connection error: " . mysqli_connect_error());
    
}



session_start();

$id = $_GET['id'];
//drop the item from cart
$sql = "DELETE FROM cart WHERE id = $id";
$result = $conn->query($sql);

header("Location: ../user/cart.php");
