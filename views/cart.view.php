<div class="flex flex-col bg-white m-12 mx-auto w-4/6">
    <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
        <div class="flex items-start justify-between">
            <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
            <?php if(empty($_SESSION['user']['address'])) { ?>
            <a href="/profile?user_id=<?php echo $_SESSION['user']['user_id'] ?> " class="text-sm text-red-500 font-bold underline hover:text-blue-500">
                Please enter an address before the Check-Out.
            </a>
            <?php } ?>
        </div>

        <div class="mt-8">
            <div class="flow-root">
                <ul role="list" class="-my-6 divide-y divide-gray-200">
                <?php 
                if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    foreach($_SESSION['cart'] as $product) { 
                        if($product['quantity'] > 0) {?>
                <li class="flex py-6">
                    <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                        <img src="<?php echo '/assests/imgs/'.$product['product_image']; ?>"  alt="<?php echo $product['product_image']; ?>" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="h-full w-full object-cover object-center">
                    </div>

                    <div class="ml-4 flex flex-1 flex-col">
                        <div>
                            <div class="flex justify-between text-base font-medium text-gray-900">
                            <h3>
                                <a href="<?php echo 'product?product_id='.$product['product_id']; ?>"><?php echo $product['name'] ?></a>
                            </h3>
                            <p class="ml-4"><span class="text-xs text-gray-500 mx-2">Subtotal:</span>$<?php echo calculateSubtotal($product) ?></p>
                            </div>
                            <p class="mt-1 text-sm text-gray-500"><?php echo $product['category']?></p>
                            
                            <p class="text-gray-500"><span class="mt-1 text-sm text-gray-500">Quantity: </span> <?php echo $product['quantity']?></p>
                        </div>
                        <div class="flex flex-1 items-end justify-between text-sm">
                            <div class="flex space-x-4">
                                <div class="flex justify-center items-center">
                                    <form action="cart" method="POST">
                                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']?>">
                                        <input type="hidden" name="requested_quantity" value="<?php echo $product['quantity']?>">
                                        <button name="remove_product" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                    </form>
                                </div>
                                <div class="flex justify-center items-center">
                                    <form action="cart" method="POST">
                                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']?>">
                                        <input type="hidden" name="requested_quantity" value="<?php echo $product['quantity']?>">
                                        <button name="edit_product" class="font-medium text-indigo-600 hover:text-indigo-500">Edit</button>
                                        <input type="text" class="w-12 px-2 mx-2 border border-gray-400 rounded-sm" name="requested_quantity" value="<?php echo $product['quantity']; ?>">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <?php } else{
                    unset($_SESSION['cart'][$product['product_id']]);
                }}} else { ?>
                </ul>
                <a href="/" class="text-blue-600 text-lg underline hover:text-blue-500"> There are no items in the cart.</a href="">
                <?php } ?>
            </div>
        </div>
    </div>
    <hr class="border-top border-indigo-300 mx-12">
    <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
        <div class="my-2">
            <?php if(isset($_SESSION['errors']['amount_left'])) { 
                    foreach($_SESSION['errors']['amount_left'] as $error){ ?>
                    <p class="text-xs text-red-500 underline"><?php echo $error ?></p>
            <?php }} ?>
        </div>
        <div class="flex text-base font-medium text-gray-900">
            <p><span class="text-gray-500 mr-2">Total:</span> </p>
            <p>$<?php echo calculateTotalPrice(); ?></p>
            </div>
        <div class="mt-6">
            <form action="/checkout" method="POST">  
                <button name="checkout" class="rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</button>
            </form>
            <?php if(isset($_SESSION['errors']['address'])) { ?>
                  <a href="/profile?user_id=<?php echo $_SESSION['user']['user_id'] ?>" class="text-sm text-red-500 mt-2 underline hover:text-blue-300"> <?php echo $_SESSION['errors']['address'] ?></a>
            <?php } ?>
        </div>
    </div>
</div>

<?php
if(isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}
?>