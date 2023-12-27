<?php
if(!isset($_SESSION['user'])){
    header("Location: /login");
    exit();
}
        
if(isQuantityAvailable($requested_quantity, $product)){
    updateCart($product, $requested_quantity);
}
else{
    // (!) add warning for user: "Not enough products in store"
}