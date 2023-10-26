<?php 

declare(strict_types=1);

function check_signup_errors() {
    if(isset($_SESSION['errors_signup'])){
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach($errors as $error){
            echo '<p class="form-error">' . $error . '</p>';
        }

        // since we do not need the content anymore, unsetting the session variable.
        unset($_SESSION['errors_signup']);
        
    } elseif (isset($_GET['signup']) && $_GET['signup'] == "success" ) {
        echo '<br>';
        echo '<p class="form-success">Signup Success!</p>';
    }
}


// more validations will be added for instance: invalid_username
function signup_inputs(){
    if(isset($_SESSION['signup_data']['username']) && !isset($_SESSION['errors_signup']['username_taken'])){
        //if username entered without any problems 
        echo '<input type="text" name="username" value="' . $_SESSION['signup_data']['username'] . '">';
    } else {
        //if username is taken or not entered
        echo '<input type="text" name="username" placeholder="Username">';
    }

    if(isset($_SESSION['signup_data']['email']) && !isset($_SESSION['errors_signup']['invalid_email']) && !isset($_SESSION['errors_signup']['email_used'])){
        // if no problem with email entered
        echo '<input type="email" name="email" value="' . $_SESSION['signup_data']['email'] . '">';
    } else {
        // if it's taken or invalid don't show it again
        echo '<input type="email" name="email" placeholder="Email">';
    }

    // echo empty password field as convention:
    echo '<input type="password" name="password" placeholder="Password">';
}