<?php

// include_once '../includes/dbh-inc.php';

// if(isset($_POST['add_product'])){
//     $p_name =   $_POST['p_name'];
//     $p_price =  $_POST['p_price'];
//     $p_imgage = $_FILES['p_imgage']['name'];
//     $p_image_folder = "../uploaded_img/".$p_imgage;


// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../../style.css"> -->
    <!-- <link rel="stylesheet" href="../../product.css"> -->
    <link rel="icon" type="image/png" href="../img/logo.png" sizes="16x16">
    <title>Admin Interface</title>
</head>
<body>
    <div class="container">
    <header>
            <div class="logo"><span>Hopi Crafts</span></div>
            <div class="nav-links"> 
                <ul>
                    <li><a href="admin-landing.php">Back</a></li>

                </ul>
            </div>

        </header>
    <section>
            <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
                <h3>add new product</h3>
                <input type="text" name="p_name" placeholder="enter the product name" class="box" required>
                <input type="number" name="p_price" placeholder="enter the product price" class="box" required>
                <input type="file" name="p_imgage" accept="image/png, image/jpg, image/jpeg" class="box" required>
                <input type="submit" name="add_product" value="add product" class="btn">
            </form>
        </section>
    </div>
</body>
</html>