<?php

@include('../includes/dbh.inc.php');

session_start();

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['pwd']);
    $pass2 = md5($_POST['pwd2']);
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        
        $row = mysqli_fetch_array($result);

        if($row['user_type'] == 'admin'){
            $_SESSION['admin_name'] = $row['name'];
            header("Location: admin-landing.php");
    }elseif($row['user_type'] == 'user'){
        $_SESSION['user_name'] = $row['name'];
        header("Location: user-landing.php");
    }else{
        $error[] = 'incorrect email or password';
    }

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../css/no-scroll.css">
    <link rel="icon" type="image/png" href="../img/logo.png" sizes="16x16">
    <title>Sign In</title>
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
          <h1>Sign In</h1>
          <p>Enter your username and password</p>
      </div>
    
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error">'.$error.'</span>';
         };
      };
      ?>
      <form class="fill-up" method="post">
        <input type="text" id="email" name="email" placeholder="Email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        <br>
        <input type="password" id="password" name="password" placeholder="Password">
        <br>
        <button class="fillButton" type="submit" name="submit">Sign In</button>
        <p>Don't have an account? <a href="sign-up.php">Sign Up</a></p>
    </form>
</div>
</body>
</html>