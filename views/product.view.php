
<section class="container my-5 pt-5">
<?php if($product) { echo getcwd()?>
    <div class="row mt-5">
        <div class="col-lg-5 col-md-6 col-sm-12">
            <img class="img-fluid w-100 pb-1" src="<?php echo '/assests/imgs/'.$product['product_image'] ?>" alt="<?php echo $product['product_image']; ?>">
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <form action="/cart" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
                <input type="hidden" name="category_id" value="<?php echo $category['category_id'] ?>">
                
                <h5><span class="fw-bold"> Category: </span><?php echo $category['name']?> </h5>
                <h5><span class="fw-bold"> Product Name: </span><?php echo $product['name']?> </h5>
                <h5><span class="fw-bold"> Product Price: </span> $<?php echo $product['price']?> </h5>
                <h5><span class="fw-bold"> Amount Left: </span> <?php echo $product['amount_left']?> </h5>
                <div class="d-flex flex-column mb-2">
                    <div class="mb-2">
                        <label for="requested_quantity">Quantity:</label>
                        <input type="number" id="requested_quantity" name="requested_quantity" value="1" min="1" max="<?php echo $product['amount_left'] ?>">
                    </div>
                    <button name="add_product" class="btn btn-primary">Add Product</button>
                </div>
            </form>
        </div>
    </div>
    
<?php } ?>
</section>



    
