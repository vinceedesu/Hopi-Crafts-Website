<?php
//database connection
include_once("dbh-inc.php");


// check if the user submitted the form
if(isset($_POST['submit'])){



    //variables
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $pass = htmlentities($_POST['pwd']);
    $pass2 = htmlentities($_POST['pwd2']);
    $user_type = "user";

        
    
    //if fields are empty
    if(empty($name) || empty($email) || empty($pass) || empty($pass2)){
        header("Location: ../php/sign-up.php?error=emptyfields");
    }


    //check if email is valid
    else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        header("Location: ../php/sign-up.php?error=invalidemail");
    }

    //check if passwords match
    else if($_POST['pwd'] != $_POST['pwd2']){
        header("Location: ../php/sign-up.php?error=passwordsdontmatch");
    }
    //check if password is at least 6 characters
    else if(strlen($_POST['pwd']) < 6){
        header("Location: ../php/sign-up.php?error=passwordistooweak");
    }
        else{
        //check if email already exists
        $sql = "SELECT * FROM user_form WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        //fetch the row as array
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result){
            header("Location: ../php/sign-up.php?error=emailalreadyexists");
        }
        else{
            //hash password
            $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);

            //insert user into database
            $sql = "INSERT INTO user_form (name, email, password, user_type) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$name, $email, $hashedPwd, $user_type]);
            header("Location: ../php/signup-success.php");
        }
}

}