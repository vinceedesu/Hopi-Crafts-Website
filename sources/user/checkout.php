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

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../admin/product.css">
    <link rel="icon" type="image/png" href="../img/logo.png" sizes="16x16">
    <title>Checkout</title>
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
    <div class="container">
 
            <form  method="post" class="form-fill">
                <h3>Checkout</h3>
                <input type="text" name="name" id="name" value="<?php echo $_SESSION['name']?>" required>
                <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']?>" required>
                <input type="text" name="address" id="address" placeholder="Enter your address" required>
                <!-- <label for="payment">Payment</label> -->
                <select name="payment" id="payment" required>
                    <option value="cash">Cash</option>
                    <option value="card">Card</option>
                </select>
                <input type="submit" name="checkout" value="Checkout" class="btn">

            </form>
    </div>

    <?php
        if(isset($_POST['checkout'])){
            
            $overall_total = 0;
            //insert into cart database PDO
            $user_email= $_SESSION['email'];
            //select all products from cart database PDO
            $select_cart = "SELECT * FROM cart WHERE user_email = '$user_email'";
            $result = $conn->query($select_cart);
            

            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $id = $row['id'];
                    $product_name = $row['name'];
                    $product_price = $row['price'];
                    $product_quantity = $row['quantity'];
                    $product_total = $product_price * $product_quantity;
                    $overall_total += $product_total;
                    
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $payment = $_POST['payment'];
                    $status = "Pending";

                    $sql = "INSERT INTO checkout (name, price, quantity, user_email, user_name, address,method_pay, status) 
                    VALUES ('$product_name','$product_price','$product_quantity', '$email','$name', '$address','$payment', '$status')";
                    $conn->exec($sql);
                
                }
                $delete_cart = "DELETE FROM cart WHERE user_email = '$user_email'";
                $conn->exec($delete_cart);
                echo "<script>alert('Order placed successfully!')</script>";
                echo "<script>window.open('user-landing.php','_self')</script>";
                
                

            }
            //display all products from cart database PDO

        }
    ?>
</body>
</html>