<div class="bg-white ">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <div class="border-b border-gray-900/10 pb-12">
            <div>
            <hr class="border-top border-indigo-300 mx-12 mb-5">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                    <div class="mt-2">
                        <input readonly value="<?php echo $_SESSION['user']['first_name']?>" type="text" name="first_name" id="first_name" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                    <div class="mt-2">
                        <input readonly value="<?php echo $_SESSION['user']['last_name']?>" type="text" name="last_name" id="last_name" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                
                <div class="sm:col-span-3">
                    <label for="birth_date" class="block text-sm font-medium leading-6 text-gray-900">Birthdate</label>
                    <div class="mt-2">
                        <input readonly value="<?php echo $_SESSION['user']['birth_date']?>" type="text" name="birth_date" id="birth_date" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input readonly value="<?php echo $_SESSION['user']['email']?>" id="email" name="email" type="email" autocomplete="email" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
            
            <form action="/address/store" method="POST">
                
                <div class="mt-8 space-y-4">
                    
            <hr class="border-top border-indigo-300 mx-12">
                    <h2 class="col-span-full text-base font-semibold leading-7 text-gray-900 <?php echo (isset($_SESSION['user']['address']) && !empty($_SESSION['user']['address'])) ? "" : "underline text-red-500" ?>">Address Information:</h2>
                    <div class="sm:col-span-3">
                        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
                        <div class="mt-2">
                            <select id="country" name="country" autocomplete="country-name" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option>Belgium</option>
                            </select>
                        </div>
                        <?php if(isset($_SESSION['errors']['address']['country'])) { ?>
                            <p class="text-sm text-red-500 mt-2"> <?php echo $_SESSION['errors']['address']['country'] ?></p>
                        <?php } ?>
                    </div>

                    <div class="col-span-full">
                        <label for="street" class="block text-sm font-medium leading-6 text-gray-900">Street address</label>
                        <div class="mt-2">
                            <input value="<?php if(isset($_SESSION['inputs'])){echo $_SESSION['inputs']['street'];} else if(isset($_SESSION['user']['address']) && !empty($_SESSION['user']['address'])) { echo $_SESSION['user']['address']['street']; } ?>" type="text" name="street" id="street" autocomplete="street-address" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <?php if(isset($_SESSION['errors']['address']['street'])) { ?>
                            <p class="text-sm text-red-500 mt-2"> <?php echo $_SESSION['errors']['address']['street'] ?></p>
                        <?php } ?>
                    </div>

                    <div class="col-span-half">
                        <label for="house_number" class="block text-sm font-medium leading-6 text-gray-900">House Number</label>
                        <div class="mt-2">
                            <input value="<?php  if(isset($_SESSION['inputs'])){echo $_SESSION['inputs']['house_number'];} else if(isset($_SESSION['user']['address']) && !empty($_SESSION['user']['address'])) { echo $_SESSION['user']['address']['house_number']; }?>" type="text" name="house_number" id="house_number" autocomplete="house_number" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <?php if(isset($_SESSION['errors']['address']['house_number'])) { ?>
                            <p class="text-sm text-red-500 mt-2"> <?php echo $_SESSION['errors']['address']['house_number'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="col-span-half">
                        <label for="bus_number" class="block text-sm font-medium leading-6 text-gray-900">Bus Number</label>
                        <div class="mt-2">
                            <input value="<?php  if(isset($_SESSION['inputs'])){echo $_SESSION['inputs']['bus_number'];} else if(isset($_SESSION['user']['address']) && !empty($_SESSION['user']['address'])) { echo $_SESSION['user']['address']['bus_number']; }?>" type="text" name="bus_number" id="bus_number" autocomplete="bus_number" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <?php if(isset($_SESSION['errors']['address']['bus_number'])) { ?>
                            <p class="text-sm text-red-500 mt-2"> <?php echo $_SESSION['errors']['address']['bus_number'] ?></p>
                        <?php } ?>
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                        <div class="mt-2">
                            <input value="<?php  if(isset($_SESSION['inputs'])){echo $_SESSION['inputs']['city'];} else if(isset($_SESSION['user']['address']) && !empty($_SESSION['user']['address'])) { echo $_SESSION['user']['address']['city']; }?>" type="text" name="city" id="city" autocomplete="city" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <?php if(isset($_SESSION['errors']['address']['city'])) { ?>
                            <p class="text-sm text-red-500 mt-2"> <?php echo $_SESSION['errors']['address']['city'] ?></p>
                        <?php } ?>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="zip_code" class="block text-sm font-medium leading-6 text-gray-900">ZIP / Postal code</label>
                        <div class="mt-2">
                            <input value="<?php  if(isset($_SESSION['inputs'])){echo $_SESSION['inputs']['zip_code'];} else if(isset($_SESSION['user']['address']) && !empty($_SESSION['user']['address'])) { echo $_SESSION['user']['address']['zip_code']; }?>" type="text" name="zip_code" id="zip_code" autocomplete="zip_code" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <?php if(isset($_SESSION['errors']['address']['zip_code'])) { ?>
                            <p class="text-sm text-red-500 mt-2"> <?php echo $_SESSION['errors']['address']['zip_code'] ?></p>
                        <?php } ?>
                    </div>

                    <div class="col-span-full">
                        <label for="address_description" class="block text-sm font-medium leading-6 text-gray-900">Address Description</label>
                        <div class="mt-2">
                            <textarea id="address_description" name="address_description" rows="3" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?php  if(isset($_SESSION['inputs'])){echo $_SESSION['inputs']['address_description'];} else if(isset($_SESSION['user']['address']) && !empty($_SESSION['user']['address'])) { echo $_SESSION['user']['address']['address_description']; }?></textarea>
                        </div>
                    </div>
                    <button type="submit" name="save_address" id="save_address" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save Address</button>
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