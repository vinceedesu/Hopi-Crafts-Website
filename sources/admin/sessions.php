<?php

// session for admin
session_start();

// check if user is logged in
if(!isset($_SESSION['id'])){
    header("Location: ../php/login.php");
    exit();
}
// check if user is admin
if($_SESSION['user_type'] != "admin"){
    header("Location: ../user/user-landing.php");
    exit();
}
// check if user clicked the logout button
else{
    header("Location: admin-landing.php");
    exit();
}