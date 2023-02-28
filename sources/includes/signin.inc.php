<?php

session_start();

require_once("dbh-inc.php");

if(isset($_POST['submit'])){


    if(empty($_POST['email']) || empty($_POST['pwd'])){

        header("Location: ../php/login.php?error=emptyfields");
        exit();
    }
    else{
    //check email in database
    $email = htmlentities($_POST['email']);
    $pass = htmlentities($_POST['pwd']);
    
    $sql = "SELECT * FROM user_form WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    //fetch the row as array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // confirm email and password
    if($result){
        $hashedPwdCheck = password_verify($pass, $result['password']);
        if($hashedPwdCheck == false){
            header("Location: ../php/login.php?error=wrongpassword");
            exit();
        }
        else if($hashedPwdCheck == true){
            //log in the user here
            $_SESSION['id'] = $result['id'];
            $_SESSION['name'] = $result['name'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['user_type'] = $result['user_type'];

            //if user_type is user, redirect to user-landing.php
            if($_SESSION['user_type'] == "user"){
                header("Location: ../php/user-landing.php");
                exit();
            }
            //if user_type is admin, redirect to admin-landing.php
            else if($_SESSION['user_type'] == "admin"){
                header("Location: ../php/admin-landing.php?login=success");
                exit();
            }
        }
    }
    else{
        header("Location: ../php/login.php?error=nouser");
        exit();
    }
    }
}


