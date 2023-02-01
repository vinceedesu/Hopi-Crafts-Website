<?php

$serverName = "localhost";
$dbUsername = "root";
$dbName = "hopicraftDB";
$dbPassword = "";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}



