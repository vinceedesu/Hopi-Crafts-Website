<?php

include 'dbh-inc.php';

session_start();
$id = $_GET['id'];

$sql = "UPDATE checkout SET status = 'To be Delivered' WHERE id = $id";

$result = $conn->exec($sql);

header("Location: ordermanager.php");
