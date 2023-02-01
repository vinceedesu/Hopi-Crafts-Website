<?php

if(isset($_POST["submit"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignUp($name, $email,$password, $username, $passwordRepeat) !== false){

        header("location: ../php/sign-up.php>?error=emptyinput");
        exit();
    }

    
    if(invalidUid($username) !== false){

        header("location: ../php/sign-up.php>?error=invaliduid");
        exit();
    }

    
    if(invalidEmail($email) !== false){

        header("location: ../php/sign-up.php>?error=invalidemail");
        exit();
    }
    if(passwordMatch($password, $passwordRepeat) !== false){

        header("location: ../php/sign-up.php>?error=passwordsdontmatch");
        exit();
    }
    if(uidExist($conn, $username) !== false){

        header("location: ../php/sign-up.php>?error=usernametaken");
        exit();
    }

    createUser($conn, $name,$email,$password, $username);
    
}

else{
    header("location: ../php/sign-up.php");
    exit();
}