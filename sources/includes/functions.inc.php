<?php


function empytyInputSignup($name, $email, $username, $pwd, $pwd2){

    $result = false;
    if(empty($name) || empty($email) || empty($username) ||empty($pwd) || empty($pwd2)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function invalidUid($username){

    $result = false;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result = false;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwd2){
    $result = false;
    if($pwd !== $pwd2){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExist($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE uid = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../php/sign-up.php?error=stmtfailed");
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

    // mysqli_stmt_close($stmt);
}

function createUser($conn,$name, $email, $username, $pwd){
    $sql = "INSERT INTO users(name, uid, email, password_hash) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../php/sign-up.php?error=stmtfailed");
        exit();
    }

    $password_hash = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $password_hash);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ..php/signup-success.php");
}