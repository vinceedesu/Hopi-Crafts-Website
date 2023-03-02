<?php


include '../includes/dbh-inc.php';

?>

<?php
    if(isset($_POST['add_to_cart'])){
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];
        $product_img = $_POST['product_img'];
        $product_quantity =1;
        $user_email= $_SESSION['email'];

        $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE name = :name");
        $select_cart->execute([':name' => $product_name]);
     
        if($select_cart->rowCount() > 0){
           $message[] = 'Product already added to cart';
        }else{
           // Prepare and execute the INSERT statement
           $insert_product = $conn->prepare("INSERT INTO `cart`(name, price, image, quantity) VALUES(:name, :price, :image, :quantity)");
           $insert_product->execute([
              ':name' => $product_name,
              ':price' => $product_price,
              ':image' => $product_image,
              ':quantity' => 1
           ]);
           $message[] = 'Product added to cart successfully';
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
    <link rel="stylesheet" href="../../product.css">
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

        <div>
        <section class="products">

            <h2 class="heading">
                Latest Products
            </h2>

        </section>
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
                        <div class="price">Php<?php echo $fetch_product['price']?></div>
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']?>">
                        <input type="hidden" name="product_img" value="<?php echo $fetch_product['img_file']?>">
                        <input type="submit" class="btn" value="Add to Wishlist" name="add_to_cart">
                    </div>
                </form>
            </div>
        </div>
        <?php
            };
      ?>
</body>
</html>
