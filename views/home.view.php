
<section class="container text-center mt-5 py-5">
    <h3>Products</h3>
    <hr class="mx-auto">
    <div class="row mx-auto container-fluid">
        <?php foreach ($products as $product) { ?>
        <div class="card m-2" style="width: 18rem;">
            <img class="" src="assests/imgs/<?php echo $product['product_image'] ?>" alt="">
            <div class="card-body">
                <h4 class="card-title">
                    <?php echo $product['name'] ?>
                </h4>
                <h5>Amount left: <?php echo $product['amount_left'] ?></h5>
                <p class="card-text">
                    $<?php echo $product['price'] ?>
                </p>
                <a href="<?php echo 'product?product_id='.$product['product_id'] ?>" class="btn btn-primary">Show Product</a>
            </div>
        </div>
        <?php } ?>
    </div>
</section>