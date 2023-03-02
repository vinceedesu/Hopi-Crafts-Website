<?php

include 'dbh-inc.php';

session_start();
$id = $_GET['id'];

// delete row from database
$sql = "UPDATE checkout SET status = 'Received' WHERE id = $id";

$result = $conn->exec($sql);


header("Location: orders.php");
