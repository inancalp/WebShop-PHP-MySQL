<div class="bg-white ">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <form action="/products/create" method="POST">
                
                <div class="mt-8 space-y-4">
                    <h2 class="col-span-full text-base font-semibold leading-7 text-gray-900">Product Information:</h2>

                    <div class="col-span-full">
                        <label for="product_name" class="block text-sm font-medium leading-6 text-gray-900">Product Name</label>
                        <div class="mt-2">
                            <input value="<?php echo isset($_SESSION['inputs']) ? $_SESSION['inputs']['product_name'] : '' ?>" type="text" name="product_name" id="product_name" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <?php if(isset($_SESSION['errors']['product_name'])) { ?>
                            <p class="text-sm text-red-500 mt-2"> <?php echo $_SESSION['errors']['product_name'] ?></p>
                        <?php } ?>
                    </div>

                    <div class="col-span-full">
                        <label for="product_category" class="block text-sm font-medium leading-6 text-gray-900">Product Category</label>
                        <div class="mt-2">
                            <input value="<?php echo isset($_SESSION['inputs']) ? $_SESSION['inputs']['product_category'] : '' ?>" type="text" name="product_category" id="product_category" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <?php if(isset($_SESSION['errors']['product_category'])) { ?>
                            <p class="text-sm text-red-500 mt-2"> <?php echo $_SESSION['errors']['product_category'] ?></p>
                        <?php } ?>
                    </div>

                    <div class="col-span-half">
                        <label for="product_price" class="block text-sm font-medium leading-6 text-gray-900">Product Price </label>
                        <div class="mt-2">
                            <input value="<?php echo isset($_SESSION['inputs']) ? $_SESSION['inputs']['product_price'] : '' ?>" type="number" name="product_price" id="product_price" autocomplete="product_price" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <?php if(isset($_SESSION['errors']['product_price'])) { ?>
                            <p class="text-sm text-red-500 mt-2"> <?php echo $_SESSION['errors']['product_price'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="col-span-half">
                        <label for="product_quantity" class="block text-sm font-medium leading-6 text-gray-900">Product Amount </label>
                        <div class="mt-2">
                            <input value="<?php echo isset($_SESSION['inputs']) ? $_SESSION['inputs']['product_quantity'] : '' ?>" type="number" name="product_quantity" id="product_quantity"  class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <?php if(isset($_SESSION['errors']['product_quantity'])) { ?>
                            <p class="text-sm text-red-500 mt-2"> <?php echo $_SESSION['errors']['product_quantity'] ?></p>
                        <?php } ?>
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="product_image" class="block text-sm font-medium leading-6 text-gray-900">Product Image File Name</label>
                        <div class="mt-2">
                            <input value="<?php echo isset($_SESSION['inputs']) ? $_SESSION['inputs']['product_image'] : '' ?>" type="text" name="product_image" id="product_image" autocomplete="city" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <?php if(isset($_SESSION['errors']['product_image'])) { ?>
                            <p class="text-sm text-red-500 mt-2"> <?php echo $_SESSION['errors']['product_image'] ?></p>
                        <?php } ?>
                    </div>
                    <p>Please add the Image to be used into project's "/assests/imgs" directory and make sure It is same name and extension as the "File Name" section above.</p>
                    <button type="submit" name="add_product" id="add_product" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Insert Product</button>
                </div>
                
            </form>
        </div>
    </div>
</div>



<?php
if(isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}
if(isset($_SESSION['inputs'])) {
    unset($_SESSION['inputs']);
}
?>