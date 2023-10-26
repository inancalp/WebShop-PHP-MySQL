<?php 
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';
require_once 'includes/config_session.inc.php';
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>


    <h3>
        <?php
            output_username();
        ?>
    </h3>


    
    <!-- login -->
    <?php
    if(!isset($_SESSION['user_id'])) {
    ?>
        <div class="login">
        <h1>Login:</h1>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="loginSubmit" value="Login">
        </form>
        </div>
    <?php
        check_login_errors();
    }
    ?>


    <!-- signup -->
    <?php
    if(!isset($_SESSION['user_id'])) {
    ?>
        <div class="signup">
            <h1>Signup:</h1>
            <form action="includes/signup.inc.php" method="post">
                <!-- signup_model.inc.php -->
                <?php signup_inputs(); ?>
                <input type="submit" name="signupSubmit" value="Signup">
            </form>
        </div>
        <?php 
        check_signup_errors();
    }
    ?>


    <!-- logout -->

    <?php
    if(isset($_SESSION['user_id'])) {
    ?>
        <div class="logout">
            <h1>Logout</h1>
            <form action="includes/logout.inc.php" method="post">
                <input type="submit" name="logoutSubmit" value="Logout">
            </form>
        </div>
    <?php 
    }
    ?>
        
    </body>
</html>