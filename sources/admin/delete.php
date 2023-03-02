<?php

include 'dbh-inc.php';

session_start();
$id = $_GET['id'];

// delete row from database
$sql = "DELETE FROM checkout WHERE id = $id";

$result = $conn->exec($sql);

header("Location: ordermanager.php");
