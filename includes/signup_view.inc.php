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