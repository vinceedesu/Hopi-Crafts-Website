<?php

$host = "localhost";
$dbname = "hopicraft-db";
$username = "root";
$password = "";

$mysqli = mysqli_connect(hostname: $host,
                    username: $username,
                    password: $password, 
                    database: $dbname);

if ($mysqli->connect_errno){
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;