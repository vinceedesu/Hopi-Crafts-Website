<?php

$host = "localhost";
$dbname = "hopi_db";
$username = "root";
$password = "";
     

$conn = new mysqli(hostname:$host, 
                       username:$username, 
                       password:$password, 
                       database:$dbname);

if (!$conn) {
    die("Connection error: " . mysqli_connect_error());
}

else{
    echo "Connected successfully";}