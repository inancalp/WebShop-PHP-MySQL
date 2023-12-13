<?php

include('connection.php');

// $product_id = 123; 
// $new_amount_left = 50; 

// Update the product's "amount_left" attribute
$stmt = $connection->prepare("UPDATE products SET amount_left = ? WHERE product_id = ?");
$stmt->bind_param("ii", $amount_left, $product_id);
$stmt->execute();

$stmt->close();
$connection->close();
