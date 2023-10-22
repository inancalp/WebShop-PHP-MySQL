<?php 
require_once 'includes/signup_view.inc.php';
require_once 'includes/config_session.inc.php';
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="login">
            <h1>Login:</h1>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="loginSubmit" value="Login">
            </form>
        </div>
        <div class="signup">
            <h1>Signup:</h1>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="username" placeholder="Username" <?php if(isset($_SESSION['signupData']['username'])) { echo 'value="' . $_SESSION['signupData']['username'] . '"'; } ?>>
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="signupSubmit" value="Signup">
            </form>
        </div>


        <?php 
        check_signup_errors();
        ?>
    </body>
</html>