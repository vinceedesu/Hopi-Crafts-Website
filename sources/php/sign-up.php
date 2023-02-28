<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../css/no-scroll.css">
    <link rel="icon" type="image/png" href="../img/logo.png" sizes="16x16">
    <title>Sign Up</title>
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
                <h1>Sign Up</h1>
                <p>Fill up to create an Account</p>
            </div>

            <section class="signUp-form">
                <form action="../includes/signup.inc.php" method="post" novalidate>
                    <?php
                        // Check if there is any error message
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyinput") {
                                echo "<p>Fill in all fields!</p>";
                            }
                            else if ($_GET["error"] == "invalidemail") {
                                echo "<p>Choose a proper email!</p>";
                            }
                            else if ($_GET["error"] == "passwordsdontmatch") {
                                echo "<p>Passwords don't match!</p>";
                            }
                            else if ($_GET["error"] == "stmtfailed") {
                                echo "<p>Something went wrong, try again!</p>";
                            }
                            else if ($_GET["error"] == "emailalreadyexists") {
                                echo "<p>Email already exists!</p>";
                            }
                            else if ($_GET["error"] == "passwordistooweak") {
                                echo "<p>Password is too weak!</p>";
                            }
                            else if ($_GET["error"] == "none") {
                                echo "<p>You have signed up!</p>";
                            }
                        }
                    ?>
                <input type="text" id="name" name="name" placeholder="enter your name">
                <br>
                <input type="email" id="email" name="email" placeholder="enter your email">
                <br>
                <input type="password" id="pwd" name="pwd" placeholder="enter your password">
                <br>
                <input type="password" id="pwd2" name="pwd2" placeholder="confirm your password">
                <br>
                <!-- <select name="user_type" id="user_type">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select> -->
                <button class="fillButton" type="submit" name="submit">Sign Up</button>
                <p>Already have an account? <a href="login.php">Log In</a></p>
                </form>
            <?php 
          
        ?>
            </section>
        </div>
</body>
</html>
