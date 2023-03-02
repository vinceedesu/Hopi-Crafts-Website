<?php
include 'dbh-inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../img/logo.png" sizes="16x16">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="tables.css">
    <link rel="stylesheet" href="products.css">
    <title>Order Manager</title>
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
<h3 class="h3">Order Manager</h3>
<div class= "table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Email</th>
            <th>Name</th>
            <th>Status</th>
            <th>Payment Method</th>
            <th>Order Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <?php

            
            $sql = "SELECT * FROM checkout";
            $result = $conn->query($sql);

            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $id = $row['id'];
                    $product_name = $row['name'];
                    $product_price = $row['price'];
                    $product_quantity = $row['quantity'];
                    $email = $row['user_email'];
                    $name = $row['user_name'];
                    $status = $row['status'];
                    $payment = $row['method_pay'];
                    $order_date = $row['date'];


                    echo "<tr>
                            <td>$product_name</td>
                            <td>$product_price</td>
                            <td>$product_quantity</td>
                            <td>$email</td>
                            <td>$name</td>
                            <td>$status</td>
                            <td>$payment</td>
                            <td>$order_date</td>
                            <td>
                                <a href='ship.php?id=$id'>Ship</a>
                                <a href='deliver.php?id=$id'>Deliver</a>
                                <a href='delete.php?id=$id'>Delete</a>
                            </td>
                        </tr>";
                
                }
                
                

            }
           

        
        ?>
    </table>
</div>

</body>
</html>