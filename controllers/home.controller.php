<?php

// session_start();

include('server/get_products.php');

$products = getProducts();

include('views/home.view.php');