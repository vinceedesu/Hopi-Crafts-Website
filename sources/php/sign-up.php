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
                <form action="../includes/signup.inc.php" method="post">
                <input type="text" id="name" name="name" placeholder="Full Name...">
                <br>
                <input type="text" id="username" name="uid" placeholder="Username...">
                <br>
                <input type="email" id="email" name="email" placeholder="Email...">
                <br>
                <input type="password" id="password" name="password" placeholder="Password...">
                <br>
                <input type="password" id="passwordRepeat" name="passwordRepeat" placeholder="Repeat password...">
                <br>
                <button class="fillButton" type="submit" name="submit">Sign Up</button>
                </form>

            <?php 
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields</p>";
                }
                else if($_GET["error"] == "invalidUid")
                {
                echo "<p>Choose a proper Username</p>";
                }
                
                else if($_GET["error"] == "invalidemail")
                {
                echo "<p>Choose a proper Email</p>";
                }
                
                else if($_GET["error"] == "passwordsdontmatch")
                {
                echo "<p>Password mismatch</p>";
                }
                else if($_GET["error"] == "stmtfailed")
                {
                echo "<p>Something went wrong, try again!</p>";
                }
                else if($_GET["error"] == "usernametaken")
                {
                echo "<p>Username already taken</p>";
                }
                else if($_GET["error"] == "none")
                {
                echo "<p>You have sign up</p>";
                }

            }
        ?>
            </section>
        </div>
</body>
</html>
