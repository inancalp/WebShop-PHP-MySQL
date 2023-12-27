<?php
include('server/products.php');
// dd($_SESSION);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $product_id = isset($_POST['product_id']) ? htmlspecialchars($_POST['product_id']) : '';
    $category_id = isset($_POST['cate$category_id']) ? htmlspecialchars($_POST['cate$category_id']) : '';
    $requested_quantity = isset($_POST['requested_quantity']) ? intval(htmlspecialchars($_POST['requested_quantity'])) : null;
    $updated_requested_quantity = isset($_POST['updated_requested_quantity']) ? intval(htmlspecialchars($_POST['updated_requested_quantity'])) : null;

    $product = ProductsDB::getProduct($product_id);
    $category = ProductsDB::getCategory($product);

    // $arr = [
    //     'product_id' => $product_id,
    //     'category_id' => $category_id,
    //     'requested_quantity' => $requested_quantity,
    //     'updated_requested_quantity' => $updated_requested_quantity,
    //     'product' => $product,
    //     'category' => $category,
    // ];
    

    // dd($arr);
    //ADD PRODUCT
    if(isset($_POST['add_product'])) {
        require_once("controllers/cart/add.php");
    }
    //REMOVE PRODUCT
    if(isset($_POST['remove_product'])) {
        require_once("controllers/cart/remove.php");
    }
    //EDIT PRODUCT
    if(isset($_POST['edit_product'])) {
        // dd("REACH");
        require_once("controllers/cart/edit.php");
    }


    // change to require_once("controllers/cart/show.php"); later on
    require_once('views/cart.view.php');
    exit();
}



if ($_SERVER["REQUEST_METHOD"] == "GET") {
// change to require_once("controllers/cart/show.php"); later on
    include('views/cart.view.php');
    exit();
}

function isQuantityIncreased($requested_quantity, $updated_requested_quantity) {
    return $updated_requested_quantity > $requested_quantity;
}

function isQuantityAvailable($requested_quantity, $product) {
    if($requested_quantity <= $product['amount_left']){
        return true;
    }
    return false;
}

// function dbUpdateAmountLeft($product, $requested_quantity) {

//     $amount_left = intval($product['amount_left']) - intval($requested_quantity);
//     $product_id = $product['product_id'];
//     ProductsDB::updateAmountLeft($product_id, $amount_left);
// }


function addToCart($product, $category, $requested_quantity) {
    $_SESSION['cart'][$product['product_id']] = array(
        'product_id' => $product['product_id'],
        'product_image' => $product['product_image'],
        'name' => $product['name'],
        'quantity' => $requested_quantity,
        'price' => $product['price'],
        'category' => $category['name'],
    );
    // dbUpdateAmountLeft($product, $requested_quantity);
}


function updateCart($product, $requested_quantity) {
    $_SESSION['cart'][$product['product_id']]['quantity'] = $requested_quantity;
    // dbUpdateAmountLeft($product, $requested_quantity);
}

function isProductInCart($product) {
    if (isset($_SESSION['cart'][$product['product_id']])) {
        return true;
    }
    return false;
}

function directToPreviousView() {
    $previousPage = $_SERVER['HTTP_REFERER'] ?? 'index.php'; 
    header("Location: $previousPage");
    exit;
}

function removeProductFromCart($product_id) {
    unset($_SESSION['cart'][$product_id]);
}


function directToProductView($product_id) {
    $url = "../product.php?product_id=" . $product_id;
    header("Location: $url");
}


function calculateSubtotal($product) {
    return floatval($product['quantity']) * floatval($product['price']);  
}

function  calculateTotalPrice() {
    $total_price = 0;

    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $product){
            $total_price += floatval($product['price']) * intval($product['quantity']) ;
        }
    }

    $_SESSION['total_price'] = $total_price;
    return $total_price;
}