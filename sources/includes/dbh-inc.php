<?php

$host = "localhost";
$dbname = "hopi_db";
$username = "root";
$password = "";
     

$conn = new PDO("mysql:host=$host;
                dbname=$dbname", 
                $username, 
                $password);


if (!$conn) {
    die("Connection error: " . mysqli_connect_error());
}


// else{
//     echo "Connected successfully";}