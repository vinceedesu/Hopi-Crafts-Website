<?php

if (empty($_POST["name"])) {
    die("Name is required");
}

if (empty($_POST["uid"])) {
    die("uid is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["pwd"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["pwd"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["pwd"])) {
    die("Password must contain at least one number");
}

if ($_POST["pwd"] !== $_POST["pwd2"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["pwd"], PASSWORD_DEFAULT);

print_r($_POST);
var_dump($password_hash);

$mysqli = require __DIR__ . "/dbh-inc.php";

$sql = "INSERT INTO users (name,uid, email, password_hash)
        VALUES (?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss",
                  $_POST["name"],
                  $_POST["uid"],
                  $_POST["email"],
                  $password_hash);
