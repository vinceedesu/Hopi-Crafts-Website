<?php

function emptyInputSignUp($name, $email,$password, $username, $passwordRepeat){
    $result = true;

    if(empty($name) || empty($email) ||empty($username) ||empty($password) ||empty($passwordRepeat)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}
function invalidUid($username){
    $result = true;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    } 
    return $result;   
}

function invalidEmail($email){
    $result = true;

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    } 
    return $result;   
}

function passwordMatch($password,$passwordRepeat){
    $result = true;

    if($password !== $passwordRepeat){
        $result = true;
    }
    else{
        $result = false;
    } 
    return $result;   
}

function uidExist($conn, $username, $email){

    $sql = "SELECT * FROM users WHERE userUid = ? OR userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $sql)){

        
        header("location: ../php/sign-up.php>?error=stmtfailed");
        exit();

    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);

    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

}

function createUser($conn, $username, $email, $name, $password){
    $sql = "INSERT INTO users(usersName, usersEmail, usersUid, userPwd) VALUES(?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(mysqli_stmt_prepare($stmt, $sql)){

        
        header("location: ../php/sign-up.php>?error=stmtfailed");
        exit();

    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $name, $password);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../php/sign-up.php?error=none");
    exit();


}

?>