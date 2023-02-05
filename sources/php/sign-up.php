<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../css/no-scroll.css">
    <title>Sign Up</title>
</head>
<body>
    <header>
        <div class="logo"><span>Hopi Crafts</span></div>
        <div class="nav-links"> 
            <ul>
                <li><a href="login.php">Back</a></li>
    
            </ul>
        </div>
    </header>
        <div class="logIn">
            <div class="text-content">
                <h1>Sign Up</h1>
                <p>Fill up the form</p>
            </div>
            <section class="signUp-form">
                <form action="../../dbh-inc.php" method="post" novalidate>
                <input type="text" id="name" name="name" placeholder="Full Name...">
                <br>
                <input type="text" id="username" name="uid" placeholder="Username...">
                <br>
                <input type="email" id="email" name="email" placeholder="Email...">
                <br>
                <input type="password" id="pwd" name="pwd" placeholder="Password...">
                <br>
                <input type="password" id="pwd2" name="pwd2" placeholder="Repeat password...">
                <br>
                <button class="fillButton" type="submit" name="submit">Sign Up</button>
                </form>

            <?php 
          
        ?>
            </section>
        </div>
</body>
</html>
