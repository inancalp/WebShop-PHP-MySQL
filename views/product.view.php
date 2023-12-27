<div class="bg-white min-h-screen flex items-center justify-center">
    <?php if($product) { ?>
    <div class=" sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
        <!-- Image Container -->
        <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg lg:ms-20 border-4 rounded border-indigo-400">
            <img src="<?php echo '/assests/imgs/'.$product['product_image'] ?>" alt="<?php echo $product['product_image']; ?>" class="h-full w-full object-cover object-center">
        </div>

        <!-- Product info Container -->
        <div class="flex items-center justify-center px-4 pb-16 pt-10 sm:px-6 lg:grid lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
            <div class="mt-4 lg:mt-0 lg:row-span-3 lg:col-span-2 lg:pr-8">
                <h1 class="text-xl font-bold tracking-tight text-gray-900 text-xl">
                    Product Name: </span><?php echo $product['name']?>    
                </h1>
                <p class="text-xl tracking-tight text-gray-900">
                    Category: </span><?php echo $category['name']?> 
                </p>
                <p class="text-xl tracking-tight text-gray-900">
                    Amount Left: </span> <?php echo $product['amount_left']?> 
                </p>
                <p class="text-xl tracking-tight text-gray-900">
                    Product Price: </span> $<?php echo $product['price']?>
                </p>
                <form class="mt-10" action="/cart" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
                    <input type="hidden" name="category_id" value="<?php echo $category['category_id'] ?>">

                    <div class="">
                        <label for="requested_quantity" class="block mb-2 text-lg font-medium text-gray-900">Quantity:</label>
                        <input class="border-2 rounded border-indigo-400 px-2" type="number" type="number" id="requested_quantity" name="requested_quantity" value="1" min="1" max="<?php echo $product['amount_left'] ?>" aria-describedby="helper-text-explanation" class="rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5" placeholder="90210" required>
                    </div>
                    <button name="add_product" type="submit" class="text-md mt-5 flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>
</div>


