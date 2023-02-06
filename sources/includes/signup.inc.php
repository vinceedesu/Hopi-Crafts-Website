<?php

if(isset($_POST["submit"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwd2 = $_POST["pwd2"];

    require_once 'dbh-inc.php';
    require_once 'functions.inc.php';
    
    // if(empytyInputSignup($name, $email, $uid, $pwd, $pwd2) !== false){
    //     header("location: ../php/sign-up.php?error=emptyinput");
    //     exit();    
    // }
    
    if(invalidUid($username) !== false){
        header("location: ../php/sign-up.php?error=invalidUid");
        exit();    
    }

    if(invalidEmail($email) !== false){
        header("location: ../php/sign-up.php?error=invalidemail");
        exit();    
    }
    
    if(pwdMatch($pwd, $pwd2) !== false){
        header("location: ../php/sign-up.php?error=passwordmismatch");
        exit();    
    }

    if(uidExist($conn, $username, $email) !== false){
        header("location: ../php/sign-up.php?error=usernametaken");
        exit();    
    }

    createUser($conn, $name, $email, $username, $pwd);
}

else{
    header("location: ../php/sign-up.php");
    exit();
}