<?php

include '../includes/dbh-inc.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="product.css">
    <link rel="icon" type="image/png" href="../img/logo.png" sizes="16x16">
    <title>Admin Interface</title>
</head>
<body>
<header>
        <div class="logo"><span>Hopi Crafts</span></div>
        <div class="nav-links"> 
            <ul>
                <li><a href="admin-landing.php">Back</a></li>

            </ul>
        </div>

    </header>
    <section>
    <div class="container">

       
            <form action="" method="post" enctype="multipart/form-data"class="form-fill" >
                <h3>add new product</h3>
                <input type="text" name="p_name" placeholder="enter the product name" required class="blank-form">
                <input type="number" name="p_price" placeholder="enter the product price"  required class="blank-form">
                <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg"  required class="blank-form">
                <input type="submit" name="add_product" value="add product" class="btn">
            </form>

            <?php
                if(isset($_POST['add_product'])){
                    $p_name = $_POST['p_name'];
                    $p_price = $_POST['p_price'];
                    $p_img = $_FILES['p_image']['name'];
                    $tardirectory = "../img/uploaded_img/";
                    $target = $tardirectory . basename($p_img);
                       

                    $insert_product = $conn->prepare("INSERT INTO products (name, price, img_file) VALUES (:name, :price, :img_file)");
                    $insert_product->execute([
                        ':name' => $p_name,
                        ':price' => $p_price,
                        ':img_file' => $p_img
                    ]);
                    if (move_uploaded_file($_FILES["p_image"]["tmp_name"], $target)) {
                        // echo "The file ". 
                        htmlspecialchars( basename( $_FILES["p_image"]["name"]));
                        // . " has been uploaded.";
                    echo "product added successfully";
                }
            }
            ?>
        </section>
    </div>
</body>
</html>