<div class="w-4/6 mx-auto mt-12">
    <ul role="list" class="divide-y divide-gray-100">   

        <?php foreach($orders as $order) { ?>
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Order ID: <?php echo $order['order_id']; ?> </p>
                        <?php for($i = 0; $i < count($order['products']); $i++) { ?>
                            <hr class="border-top border-indigo-300 mx-12 my-1">
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                Product Name: <?php echo $order['products'][$i]['name'] ?>
                            </p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                Order Amount: <?php echo $order['orders_products'][$i]['product_amount'] ?>
                            </p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                Subtotal: $<?php echo $order['orders_products'][$i]['subtotal'] ?>
                            </p>
                        <?php } ?>
                    </div>
                </div>
                <div class="shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">Order date: <?php echo $order['order_date'] ?></p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">Total Price: $<?php echo $order['payment']['total_price'] ?> </p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">Payment Status: <?php echo strtoupper($order['payment']['payment_status']) ?> </p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">Delivery Status: <?php echo strtoupper($order['order_status']) ?> </p>
                </div>
            </li>
        <?php } ?>
    </ul>

</div>