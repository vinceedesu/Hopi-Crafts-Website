<?php

//session for admin
include_once('sessions.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hopi Crafts</title>
    <script src="script.js"></script> 
    <link rel="icon" type="image/png" href="../img/logo.png" sizes="16x16">
    <link rel="stylesheet" href="../../style.css">


</head>
<body>

    <div class="main">
        <header>
        
            <div class="logo"><span>Hopi Crafts</span></div>
            <div class="nav-links"> 
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#collections">Collections</a></li>
                    <li><a href="#shop">Shop</a></li>
                    <li><a href="#about-us">About Us</a></li>
                    <li><a href="#"><?php echo $_SESSION['name']?></a></li>
                    <li><a href="addproducts.php">Add Products</a></li>
                    <li><a href="ordermanager.php">Order Manager</a></li>
                    <li><a href="shop.php">Shop Manager</a></li>
                    <li><a href="..\php\logout.php">Logout</a></li>

                </ul>
            </div>
        </header>
            
<?php
include 'content.php';
include '../php/footer.php';
?>