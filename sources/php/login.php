<?php

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

      ?>
      <form class="fill-up"  method="post" action="../includes/signin.inc.php">
        <?php
            //error messages
            if(isset($_GET['error'])){
                if($_GET['error'] == "emptyfields"){
                    echo '<p class="error">Please fill in all fields</p>';
                }
                else if($_GET['error'] == "wrongpassword"){
                    echo '<p class="error">Wrong password</p>';
                }
                else if($_GET['error'] == "nouser"){
                    echo '<p class="error">No user found</p>';
                }
            }
        ?>
        <input type="text" id="email" name="email" placeholder="Email">
        <br>
        <input type="password" id="password" name="pwd" placeholder="Password">
        <br>
        <button class="fillButton" type="submit" name="submit">Sign In</button>
        <p>Don't have an account? <a href="sign-up.php">Sign Up</a></p>
    </form>
</div>
</body>
</html>