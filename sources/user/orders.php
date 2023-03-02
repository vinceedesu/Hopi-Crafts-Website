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
    <title>My Orders</title>
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
    <h1>My Orders</h1>
    <div>
        <table>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Order Date</th>
                <th>Actions</th>
            </tr>
            <?php
                include 'session.php';
                $user_email = $_SESSION['email'];
            
            $overall_price = 0;
            $sql = "SELECT * FROM checkout WHERE user_email= '$user_email' AND status !='Received'";
            $result = $conn->query($sql);
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $price = $row['price'];
                    $quantity = $row['quantity'];
                    $status = $row['status'];
                    $order_date = $row['date'];
                    $total_price = $quantity * $price;
                    $overall_price = $overall_price + $total_price;

                    if($status == 'To be Delivered'){
                        $action = "<a href='receive.php?id=$id'>Received</a>";
                    }
                    else{
                        $action = "N/A";
                    }

                    echo "<tr>
                            <td>$name</td>
                            <td>$total_price</td>
                            <td>$quantity</td>
                            <td>$status</td>
                            <td>$order_date</td>
                            <td>$action</td>
                        </tr>";

                }
 
            }
            ?>


        </table>
        <div>
            <h3>Total Price: <?php echo $overall_price; ?></h3>
    </div>
</body>
</html>