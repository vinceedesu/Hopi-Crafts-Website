<?php

if(empty($_POST["name"])){
    die("Name is required");
}

if(empty($_POST["uid"])){
    die("Username is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){

    die("Valid email required");
}

if(strlen($_POST["pwd"]) < 8){
    die("Password must be atleasr 8 characters");
}
// must  contain letter
if(!preg_match("/[a-z]/i",$_POST["pwd"])){

    die("Password must contain atleast 1 letter");
}
// must contain number
if(!preg_match("/[0-9]/i",$_POST["pwd"])){

    die("Password must contain atleast 1 number");
}

if($_POST["pwd"] !== $_POST["pwd2"]){
    die("Password must match");
}

$password_hash = password_hash($_POST["pwd"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "sources\includes\dbh-inc.php";

print_r($_POST);
var_dump($password_hash);