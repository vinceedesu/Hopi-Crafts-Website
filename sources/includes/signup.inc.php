<?php
// check if the user submitted the form
if(isset($_POST['submit'])){

    // include the database connection file
    include_once 'dbh.inc.php';

    // get values from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = md5($_POST['pwd']);
    $pass2 = md5($_POST['pwd2']);
    $user_type = '';

    // check if the user already exists
    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[]= "user already exists";
    }else{
        if($pass != $pass2){
            $error[] = "passwords do not match";
        }else{
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $insert = "INSERT INTO user_form (name, email, password, user_type) VALUES ('$name', '$email', '$pass', '$user_type')";
            mysqli_query($conn, $insert);
            header("Location: ../php/signup-success.php");
        }
    }
}

// if (empty($_POST["name"])) {
//     die("Name is required"); 
// }

// if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
//     die("Valid email is required");
// }

// if (strlen($_POST["pwd"]) < 6) {
//     die("Password must be at least 6 characters");
// }

// if ( ! preg_match("/[a-z]/i", $_POST["pwd"])) {
//     die("Password must contain at least one letter");
// }

// if ( ! preg_match("/[0-9]/", $_POST["pwd"])) {
//     die("Password must contain at least one number");
// }

// if ($_POST["pwd"] !== $_POST["pwd2"]) {
//     die("Passwords must match");
// }

// $password_hash = password_hash($_POST["pwd"], PASSWORD_DEFAULT);

// $mysqli = require __DIR__ . "/dbh-inc.php";

// $sql = "INSERT INTO users (name, email,  password_hash)
//         VALUES (?, ?, ?)";
        
// $stmt = $mysqli->stmt_init();

// if ( ! $stmt->prepare($sql)) {
//     die("SQL error: " . $mysqli->error);
// }

// $stmt->bind_param(
//     "sss",
//     $_POST["name"],
//     $_POST["email"],
//     $password_hash
// );

// if ( ! $stmt->execute()) {
//     header("Location: ../php/signup.php?error=sqlerror");
// }
// else{
//     header("Location: ../php/signup-success.php");
//     exit();
// }