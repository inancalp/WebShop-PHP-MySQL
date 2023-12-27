<?php


if(!isset($_SESSION['user'])){
    header("Location: /login");
    exit();
}

if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == "admin"){
    abort(404);
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
    directToPreviousView();
}


