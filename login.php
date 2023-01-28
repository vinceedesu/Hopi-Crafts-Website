<!-- PHP code here -->
<?php
    $username = "";
    $password = "";
    $name = "";
?>

<!-- html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
<div class="container">
    <form action="login.php" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username">
      <br>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name">
      <br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password">
      <br>
      <input type="submit" value="Login">
    </form>
  </div>
</body>
</html>