<?php

$host = "localhost";
$dbname = "hopicraft-db";
$username = "root";
$password = "";

$conn = mysqli_connect(hostname: $host,
                    username: $username,
                    password: $password, 
                    database: $dbname);

if (!$conn){
    die("Connection error: " . mysqli_connect_error());
}

return $conn;