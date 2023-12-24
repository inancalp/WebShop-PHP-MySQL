<?php

include("controllers/user.controller.php");

if(!isUserLoggedIn()){
    header("Location: login");
    exit();
}

if(isQuantityAvailable($requested_quantity, $product)){

    if(isProductInCart($product)){
        updateCart($product, $requested_quantity);
    }
    else{
        addToCart($product, $requested_quantity);
    }

}
else{
    // (!) Do something else. return and warn user or something...
    directToPreviousView();
}

include('views/cart.view.php');
exit();

