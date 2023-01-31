<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
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
            </div>
            <section class="signUp-form">
                <form action="signup-inc.php" method="post">
                <input type="text" id="username" name="uid" placeholder="Username...">
                <br>
                <input type="email" id="email" name="email" placeholder="Email...">
                <br>
                <input type="password" id="password" name="password" placeholder="Password...">
                <br>
                <input type="password" id="passwordRepeat" name="passwordRepeat" placeholder="Repeate password...">
                <br>
                <input type="submit" value="submit">
                </form>
            </section>
        </div>
</body>
</html>
