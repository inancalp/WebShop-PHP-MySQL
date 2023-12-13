<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // CHECKOUT BUTTON CLICKED:
    if(isset($_POST['checkout'])){
        //user's information and addresses etc.
        if(isCartEmpty()){
            //(!) make conditionals for empty cart.
            header("Location: index.php");
        }
        else{
            // dd($_SESSION['cart']);
            include("views/checkout.view.php");
        }
    }

}


function isCartEmpty() {
    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
        return false;
    }
    return true;
}