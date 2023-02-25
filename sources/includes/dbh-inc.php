<?php

// $host = "localhost";
// $dbname = "hopiDB";
// $username = "root";
// $password = "";

// // $mysqli = new mysqli(hostname: $host,
// //                      username: $username,
// //                      password: $password,
// //                      database: $dbname);
                     

// $conn = mysqli_connect(hostname:$host, 
//                        username:$username, 
//                        password:$password, 
//                        database:$dbname);

// if ($conn->connect_errno) {
//     die("Connection error: " . $conn->connect_error);
// }

// return $mysqli;

$conn = mysqli_connect('localhost',
                        'root',
                        '',
                        'hopiDB');