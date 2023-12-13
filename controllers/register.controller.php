<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // if register clicked
    if($_POST["register"]){


        if(!isUserExist()){
            return
        }

    }

}

include("views/register.view.php");


function isUserExist(){


    return false;
}