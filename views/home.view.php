 <div class="bg-white" id="search_results">
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">

    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Products</h2>
    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        
        <?php foreach ($products as $product) {
          if($product['amount_left'] > 0 && $product['is_active'] == 1) {?>
        <!-- product here: -->
        <div class="mb-12 group relative">
            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80 border-4 rounded border-indigo-400">
              <img class="h-full w-full object-cover object-center lg:h-full lg:w-full" src="assests/imgs/<?php echo $product['product_image'] ?>" alt="<?php echo $product['product_image'] ?>">
            </div>
            <div class="mt-4 flex justify-between">
            <div>
                <h3 class="text-sm text-gray-700">
                    <a href="<?php echo 'products/show?product_id='.$product['product_id'] ?>">
                        <span aria-hidden="true" class="absolute inset-0"></span>
                        <?php echo $product['name'] ?>
                    </a>
                </h3>
                <p class="mt-1 text-sm text-gray-500">Amount left: <?php echo $product['amount_left'] ?></p>
            </div>
            <p class="text-sm font-medium text-gray-900">$<?php echo $product['price'] ?></p>
            </div>
        </div>
        <?php }} ?>
    </div>
  </div>
</div>

