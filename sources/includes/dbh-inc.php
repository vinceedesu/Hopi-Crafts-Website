<?php

$host = "localhost";
$dbname = "hopi_db";
$username = "root";
$password = "";
     

$conn = mysqli_connect(hostname:$host, 
                       username:$username, 
                       password:$password, 
                       database:$dbname);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}