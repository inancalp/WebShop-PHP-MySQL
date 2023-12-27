<?php


if(!isset($_SESSION['user'])){
    header("Location: /login");
    exit();
}

if(isQuantityAvailable($requested_quantity, $product)){

    if(isProductInCart($product)){
        updateCart($product, $requested_quantity);
    }
    else{
        addToCart($product, $category, $requested_quantity);
    }
}
else{
    // (!) Do something else. return and warn user or something...
    directToPreviousView();
}

header("Location: /");
exit();

