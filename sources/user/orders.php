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
    
    <h1>My Orders</h1>
    <div>
        <table>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Order Date</th>
            </tr>
            <?php
                include 'session.php';
                $user_email = $_SESSION['email'];
                
            $sql = "SELECT * FROM checkout WHERE user_email= '$user_email' ";
            $result = $conn->query($sql);
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    
                    $name = $row['name'];
                    $price = $row['price'];
                    $quantity = $row['quantity'];
                    $status = $row['status'];
                    $order_date = $row['date'];
                    
                    echo "<tr>
                            <td>$name</td>
                            <td>$price</td>
                            <td>$quantity</td>
                            <td>$status</td>
                            <td>$order_date</td>
                        </tr>";
                }
            }


            ?>


        </table>
    </div>
</body>
</html>