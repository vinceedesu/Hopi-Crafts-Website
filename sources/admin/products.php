<?php

$host = "localhost";
$dbname = "hopi_db";
$username = "root";
$password = "";
     

$conn = new PDO("mysql:host=$host;
                dbname=$dbname", 
                $username, 
                $password);

const FETCH_ASSOC = 2;

if (!$conn) {
    die("Connection error: " . mysqli_connect_error());
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hopi Crafts</title>
    <script src="script.js"></script> 
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="icon" type="image/png" href="../img/logo.png" sizes="16x16">


</head>
<body>

    <div class="main">
        <header>
            <div class="logo"><span>Hopi Crafts</span></div>
            <div class="nav-links"> 
                <ul>
                    <li><a href="admin-landing.php">Back</a></li>

                </ul>
            </div>

        </header>


        <section class="products">

            <h2 class="heading">
                Latest Products
            </h2>

        </section>
        <div class="box-container">
            <?php
                //select from database products table PDO and fetch
                $select_product = $conn->prepare("SELECT * FROM products");
                $select_product->execute();

                //set the resulting array to associative
                while($fetch_product = $select_product->fetch(PDO::FETCH_ASSOC)) {
                ?>

            <form method="post">
                <div class="box">
                    <img src="../img/uploaded_img/<?php echo $fetch_product['img_file']?>">
                    <h3><?php echo $fetch_product['name']?></h3>
                    <div class="price">Php<?php echo $fetch_product['price']?></div>
                    <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']?></h3>">
                    <input type="hidden" name="product_name" value="<?php echo $fetch_product['price']?></h3>">
                    <input type="hidden" name="product_name" value="<?php echo $fetch_product['img_file']?></h3>">
                    <input type="submit" class="btn" value="Add to Wishlist" name="add_to_wishlist">
                </div>
            </form>
        </div>
        <?php
            };
      ?>
</body>
</html>
