<?php

$requested_quantity = $updated_requested_quantity - $requested_quantity;
        
if(isQuantityAvailable($requested_quantity, $product)){
    updateCart($product, $requested_quantity);
}
else{
    // (!) add warning for user: "Not enough products in store"
}