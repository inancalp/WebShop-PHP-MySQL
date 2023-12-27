<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>


<body class="h-full">
  <div>
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2">
        <div class="flex h-16 items-center justify-between">
            <div class="flex justify-between w-full items-center">
                <div class="flex space-x-4">
                    <div class="flex flex-shrink-0 items-center">
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                            alt="Your Company">
                    </div>
                    <a href="/" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
                    
                    <?php if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == "user"){ ?>
                        <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){ ?>
                        <a href="/cart" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium bold italic">
                            Cart (<?php echo count($_SESSION['cart']) ?>)
                        </a>
                        <?php } else {?>
                        <a href="/cart" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                        Cart
                        </a>
                        <?php } ?>
                        <a href="/profile?user_id=<?php echo $_SESSION['user']['user_id']?>" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Profile</a>
                        <a href="/orders" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Orders</a>

                    <?php } else if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == "admin") { ?>
                        <a href="/users" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                            Users
                        </a>
                        <a href="/products" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Products</a>
                    <?php } ?>
                </div>

                <div class="flex space-x-4">
                    
                <!-- Search Bar -->
                <?php if($_SERVER["REQUEST_URI"] == "/") { ?>
                <div class="relative flex items-center">
                    <input type="text" id="search-input"
                    class="bg-gray-900 text-white rounded-md px-3 py-1.5 placeholder-gray-400 focus:ring-2 focus:ring-inset focus:ring-white"
                    placeholder="Search Product" 
                    />
                    <div
                    class="absolute inset-y-0 right-0 flex items-center pr-3 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    </div>
                </div>
                <?php } ?>


                  
                  <?php if (isset($_SESSION['user'])) { ?>
                  <div class="mt-4">
                      <form action="/logout" method="POST">
                          <button name="logout" id="logout"
                              class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 font-medium">Log
                              out</button>
                      </form>
                  </div>
                  <?php } else { ?>
                  <div class="mt-4">
                  </div>
                  <div class="flex space-x-4">
                      <a href="/login" name="login" id="logout"
                          class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 font-medium">Login</a>
                      <a href="/register" name="register" id="logout"
                          class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 font-medium">Register</a>
                  </div>
                  <?php } ?>
                </div>
            </div>
        </div>
    </div>
</nav>


<!-- AJAX HERE -->
<script>
    $(document).ready(function(){
      $("#search-input").keyup(function(event) {
        var input = $("#search-input").val();
        $.ajax({
          url: "/ajax.php",
          method: "POST",
          async: true,
          data: {input: input},
          success: function(data){
            $("#search_results").html(data);
          }
        });
      });
    });
  </script>