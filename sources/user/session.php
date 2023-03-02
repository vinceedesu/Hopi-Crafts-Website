<?php

//session for user

session_start();

//check if user is logged in

if(!isset($_SESSION['id'])){
    header("Location: ../php/login.php");
    exit();
}

//check if user is user

if($_SESSION['user_type'] != "user"){
    header("Location: ../admin/admin-landing.php");
    exit();
}

else{
    header("Location: user-landing.php");
    exit();
}