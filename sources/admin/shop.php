<?php

// include 'dbh-inc.php';
include '../includes/signin.inc.php';

?>

<?php
    if(isset($_POST['add_to_cart'])){
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_img = $_POST['product_img'];
        $product_quantity =1;
        $user_email = $_SESSION['email'];
        $product_total = $product_price * $product_quantity;

        $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE name = :name");
        $select_cart->execute([':name' => $product_name]);
     
        if($select_cart->rowCount() > 0){
            
            $insert_product = $conn->prepare("UPDATE `cart` SET quantity = quantity + 1 WHERE name = :name");
            $insert_product->execute([':name' => $product_name]);
            $message[] = 'Product already added to cart';

        }else{
           // Prepare and execute the INSERT statement
            $insert_product = $conn->prepare("INSERT INTO `cart`(name, price, img_file, quantity, user_email) VALUES(?, ?, ?, ?, ?)");
            $insert_product->execute([$product_name, 
                                      $product_price, 
                                      $product_img, 
                                      $product_quantity,
                                      $user_email]);
            $message[] = 'Product added to cart';

        }
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
    <!-- icon link rel -->
    <link rel="icon" href="../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../css/shop.css">

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
            
        <div class="shop-gallery" id="shop-gallery">
            <h1>SHOP</h1>
            <p>Check out what we offer!</p>
            <img src="../img/Banner.png" alt="1" class="shop-shop">
        </div>

        <div class='box'>
                <?php
                    //select from database products table PDO and fetch
                    $select_product = $conn->prepare("SELECT * FROM products");
                    $select_product->execute();

                    //set the resulting array to associative
                    while($fetch_product = $select_product->fetch(PDO::FETCH_ASSOC)) {
                    ?>

                <form method="post">
                    <div class="box-container">
                        <img src="../img/uploaded_img/<?php echo $fetch_product['img_file']?>"class="img-products">
                        <h3><?php echo $fetch_product['name']?></h3>
                        <div class="price">Php <?php echo $fetch_product['price']?></div>
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']?>">
                        <input type="hidden" name="product_img" value="<?php echo $fetch_product['img_file']?>">
                        <input type="submit" class="btn" value="Delete" name="Delete_fshop">
                        
                        <?php
                            if(isset($_POST['Delete_fshop'])){
                                $product_name = $_POST['product_name'];
                                $product_price = $_POST['product_price'];
                                $product_img = $_POST['product_img'];
                                $product_quantity =1;
                                $user_email = $_SESSION['email'];
                                $product_total = $product_price * $product_quantity;
        
                                $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE name = :name");
                                $select_cart->execute([':name' => $product_name]);
                             
                              //drop from database products table PDO and fetch
                                $delete_product = $conn->prepare("DELETE FROM products WHERE name = :name");
                                $delete_product->execute([':name' => $product_name]);
                                header("Location: shop.php");
                            }


                        ?>
                    </div>
                </form>
        </div>
        <?php
            };
      ?>
<?php

include_once "footer.php";
?>