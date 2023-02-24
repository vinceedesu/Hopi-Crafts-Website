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

<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/../includes/dbh-inc.php";
    
    $sql = sprintf("SELECT * FROM users
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $users = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $users["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $users["id"];
            
            header("Location: index.php?login");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
  <div class="logIn">
      <div class="text-content">
          <h1>Sign In</h1>
          <p>Enter your username and password</p>
      </div>
    
      <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>

      <form class="fill-up" method="post">
        <input type="text" id="email" name="email" placeholder="Email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        <br>
        <input type="password" id="password" name="password" placeholder="Password">
        <br>
        <a href="sign-up.php">Sign Up</a>
        <button class="fillButton" type="submit" name="submit">Sign In</button>
      </form>
</div>
</body>
</html>