<?php

$requested_quantity = -$requested_quantity;
removeProductFromCart($product_id);
dbUpdateAmountLeft($product, $requested_quantity);


