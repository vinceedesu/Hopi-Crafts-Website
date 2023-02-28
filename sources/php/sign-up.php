<?php

// include __DIR__ . '../includes/dbh.inc.php';

// if(isset($_POST['submit'])){

//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $pass = md5($_POST['pwd']);
//     $pass2 = md5($_POST['pwd2']);
//     $user_type = '';

//     $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

//     $result = $conn->query($select);

//     if(mysqli_num_rows($result) > 0){
        
//         $error[]= "user already exists";

//     }else{
//         if($pass != $pass2){
//             $error[] = "passwords do not match";

//         }else{
//             $pass = password_hash($pass, PASSWORD_DEFAULT);
//             $insert = "INSERT INTO user_form (name, email, password, user_type) VALUES ('$name', '$email', '$pass', '$user_type')";
//             mysqli_query($conn, $insert);
//             header("Location: signup-success.php");
//         }
//     }
// }
// $name = $_POST[''];
// $email = $_POST['email'];
// $pass = $_POST['pwd'];
// $pass2 = $_POST['pwd2'];


// $sql = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

// if(mysqli_num_rows($result) > 0){
    
//     $error[]= "user already exists";

// }



// @include '../includes/dbh.inc.php';

// if(isset($_POST['submit'])){

//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $pass = md5($_POST['pwd']);
//     $pass2 = md5($_POST['pwd2']);
//     $user_type = $_POST['user_type'];

//     $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

//     $result = mysqli_query($conn, $select);

//     if(mysqli_num_rows($result) > 0){
        
//         $error[]= "user already exists";

//     }else{
//         if($pass != $pass2){
//             $error[] = "passwords do not match";

//         }else{
//             $pass = password_hash($pass, PASSWORD_DEFAULT);
//             $insert = "INSERT INTO user_form (name, email, password, user_type) VALUES ('$name', '$email', '$pass', '$user_type')";
//             mysqli_query($conn, $insert);
//             header("Location: signup-success.php");
//         }
//     }
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../../style.css"> -->
    <!-- <link rel="stylesheet" href="../css/no-scroll.css"> -->
    <link rel="icon" type="image/png" href="../img/logo.png" sizes="16x16">
    <title>Sign Up</title>
</head>
<body>
    <header>
        <div class="logo"><span>Hopi Crafts</span></div>
        <div class="nav-links"> 
            <ul>
                <li><a href="../../index.php">Back</a></li>
    
            </ul>
        </div>
    </header>
        <div class="logIn">
            <div class="text-content">
                <h1>Sign Up</h1>
                <p>Fill up to create an Account</p>
            </div>

            <section class="signUp-form">
                <form action="../includes/signup.inc.php" method="post" novalidate>
                    <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<p class="error">'.$error.'</p>';
                            }
                        }
                    ?>
                <input type="text" id="name" name="name" placeholder="enter your name">
                <br>
                <input type="email" id="email" name="email" placeholder="enter your email">
                <br>
                <input type="password" id="pwd" name="pwd" placeholder="enter your password">
                <br>
                <input type="password" id="pwd2" name="pwd2" placeholder="confirm your password">
                <br>
                <!-- <select name="user_type" id="user_type">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select> -->
                <button class="fillButton" type="submit" name="submit">Sign Up</button>
                <p>Already have an account? <a href="login.php">Log In</a></p>
                </form>
            <?php 
          
        ?>
            </section>
        </div>
</body>
</html>
