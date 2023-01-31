  <?php
    $username = "";
    $password = "";
    $email= "";
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Sign In</title>
</head>
<body>

  <header>
    <div class="logo"><span>Hopi Crafts</span></div>
    <div class="nav-links"> 
        <ul>
            <li><a href="../../index.html">Back</a></li>

        </ul>
    </div>
</header>
<div class="logIn">
    <div class="text-content">
        <h1>Sign In</h1>
        <p>Enter your username and password</p>
    </div>
    <form action="login.php" method="post">
      <input type="text" id="username" name="username" placeholder="username">
      <br>
      <input type="password" id="password" name="password" placeholder="password">
      <br>
      <a href="register.html">Register</a>
      <input type="submit" value="submit">
    </form>
  </div>
</body>
</html>