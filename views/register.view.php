<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Register</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="/register/create" method="POST">
        
      <div>
        <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
        <div class="mt-2">
          <input id="first_name" name="first_name" type="text" required class="block px-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?php echo isset($_SESSION['inputs']) ? $_SESSION['inputs']['first_name'] : '' ?>">
        </div>
      </div>

      <div>
        <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
        <div class="mt-2">
          <input id="last_name" name="last_name" type="text" required class="block px-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?php echo isset($_SESSION['inputs']) ? $_SESSION['inputs']['last_name'] : '' ?>">
        </div>
      </div>

      <div>
        <label for="birth_date" class="block text-sm font-medium leading-6 text-gray-900">Birth Date</label>
        <div class="mt-2">
          <input id="birth_date" name="birth_date" type="date" required class="block px-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?php echo isset($_SESSION['inputs']) ? $_SESSION['inputs']['birth_date'] : '' ?>">
        </div>
      </div>
      
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
        <div class="mt-2">
          <input id="email" name="email" type="email" autocomplete="email" required class="block px-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?php echo isset($_SESSION['inputs']) ? $_SESSION['inputs']['email'] : '' ?>">
        </div>
        <?php if(isset($_SESSION['errors']['email'])) { ?>
            <p class="text-sm text-red-500 mt-2"> <?php echo $_SESSION['errors']['email'] ?></p>
        <?php } ?>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
        </div>
        <div class="mt-2">
          <input id="pwd" name="pwd" type="password" required class="block px-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <?php if(isset($_SESSION['errors']['pwd'])) { ?>
            <p class="text-sm text-red-500 mt-2"> <?php echo $_SESSION['errors']['pwd'] ?></p>
        <?php } ?>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="retype_pwd" class="block text-sm font-medium leading-6 text-gray-900">Retype Password</label>
        </div>
        <div class="mt-2">
          <input id="retype_pwd" name="retype_pwd" type="password" required class="block px-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <?php if(isset($_SESSION['errors']['retype_pwd'])) { ?>
            <p class="text-sm text-red-500 mt-2"> <?php echo $_SESSION['errors']['retype_pwd'] ?></p>
        <?php } ?>
      </div>

      <input type="hidden" name="type" value="user">
      <input type="hidden" name="account_status" value="active">

      <div>
        <button type="submit" name="register" id="register" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
      </div>
    </form>
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