<?php
   include '../includes/dbh-inc.php';
   include '../includes/signin.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../../style.css"> -->
    <!-- <link rel="stylesheet" href="../css/no-scroll.css">     -->
    <link rel="icon" type="image/png" href="../img/logo.png" sizes="16x16">
    <title>Sign In</title>
</head>
<body>

<header>
    <div class="logo"><span>Hopi Crafts</span></div>
    <div class="nav-links"> 
        <ul>
            <li><a href="user-landing.php">Back</a></li>

            
        </ul>
    </div>
</header>

<div>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <tr>
            <?php
            

            $overall_total = 0;
            //insert into cart database PDO
            $user_email= $_SESSION['email'];
            //select all products from cart database PDO
            $select_cart = "SELECT * FROM cart WHERE user_email = '$user_email'";
            $result = $conn->query($select_cart);
            //display all products from cart database PDO
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $id = $row['id'];
                    $product_name = $row['name'];
                    $product_price = $row['price'];
                    $product_quantity = $row['quantity'];
                    $product_img = $row['img_file'];
                    $product_total = $product_price * $product_quantity;
                    $overall_total += $product_total;
        
                    echo "<tr>";
                    echo "<td>$product_name</td>";
                    echo "<td><img src='../img/uploaded_img/$product_img' width='100px' height='100px'></td>";
                    echo "<td>$product_quantity</td>";
                    echo "<td>Php $product_price</td>";
                    echo "<td>Php $product_total</td>";
                    echo "<td><a href='../php/remove.php?id=$id'>Delete</a></td>";
                    echo "</tr>";
                
                }

            }

            // echo $_SESSION['email'];

            ?>
        </tr>
    </table>

    <div class="total">
        <h3>Total:Php <?php echo $overall_total; ?></h3>
</div>

<div class="checkout">
    <a href="checkout.php">Checkout</a>
</div>


