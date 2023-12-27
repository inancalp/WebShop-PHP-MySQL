<h1>CART</h1>
<hr>

<div class="d-flex flex-column">
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price per Unit</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                foreach($_SESSION['cart'] as $product) { 
                    if($product['quantity'] > 0) {?>
                <tr>
                    <td>
                        <div class="d-flex">
                        <!-- getcwd() => gives current paths -->
                        <img width="15%" src="<?php echo '../assests/imgs/'.$product['product_image']; ?>"  alt="<?php echo $product['product_image']; ?>">
                        
                        <div class="ms-2">
                            <h4><a href="<?php echo 'product?product_id='.$product['product_id']; ?>"><?php echo $product['name'] ?></a></h4>
                            <h5>$<?php echo $product['price']?></h5>
                            <form action="cart" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $product['product_id']?>">
                                <input type="hidden" name="requested_quantity" value="<?php echo $product['quantity']?>">
                                <button name="remove_product" class="btn btn-danger">Remove</button>
                            </form>
                        </div>
                        
                        </div>
                    </td>
                    <td>
                        <div class="d-flex">
                            <div class="ms-2">
                                <form action="cart" method="POST">
                                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']?>">
                                    <input type="hidden" name="requested_quantity" value="<?php echo $product['quantity']; ?>">
                                    <input type="text" name="updated_requested_quantity" value="<?php echo $product['quantity']; ?>">
                                    <button name="edit_product" class="btn btn-warning">Edit</button>
                                </form>
                            </div>
                            
                        </div>
                    </td>
                    <td><h5>$<?php echo calculateSubtotal($product) ?></h5></td>
                </tr>
            <?php } else{
                unset($_SESSION['cart'][$product['product_id']]);
            }}} ?>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end">
        <div>
            <p><h3>TOTAL</h3>
            <hr>
            <h5>$<?php echo calculateTotalPrice(); ?></h5></p>
            <form action="checkout" method="POST">
                <button name="checkout" class="btn btn-primary">CHECKOUT</button>
            </form>
        </div>
    </div>
</div>





