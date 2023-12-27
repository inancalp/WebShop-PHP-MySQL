<div class="flex flex-col bg-white m-12 mx-auto w-4/6">
    <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
        <div class="flex items-start justify-between">
            <h2 class="text-lg font-medium text-gray-900 underline" id="slide-over-title">Users List</h2>
        </div>

        <div class="mt-8">
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200">
                    <?php foreach($users as $user) { ?>
                    <li>
                        <div class="flex justify-between mb-4 border border-indigo-300 p-2">
                            <div>
                                <p>User ID: <?php echo $user['user_id']; ?></p>
                                <p>User Email: <?php echo $user['email']; ?></p>
                                <p>User Type: <?php echo $user['user_type']; ?></p>
                                <p>Account Status: <?php echo $user['account_status']; ?></p>
                            </div>
                            <div class="flex space-x-6">
                                <?php if($user['account_status'] == "active") { ?>
                                    <div class="flex justify-center items-center">
                                        <form action="/users/edit" method="POST">
                                            <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                                            <button name="inactivate" class="font-medium text-indigo-600 hover:text-indigo-500 border rounded border-indigo-200 p-2">Set as Inactive</button>
                                        </form>
                                    </div>
                                <?php } else { ?>
                                    <div class="flex justify-center items-center">
                                        <form action="/users/edit" method="POST">
                                            <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                                            <button name="activate" class="font-medium text-indigo-600 hover:text-indigo-500 border rounded border-indigo-200 p-2">Set as Active</button>
                                        </form>
                                    </div>
                                <?php } ?>
                                <?php if($user['user_type'] != "admin") {?>
                                    <div class="flex justify-center items-center">
                                        <form action="/users/edit" method="POST">
                                            <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                                            <button name="set_admin" class="font-medium text-indigo-600 hover:text-indigo-500  border rounded border-indigo-200 p-2">Set as Admin</button>
                                        </form>
                                    </div>
                                <?php } else { ?>
                                    <div class="flex justify-center items-center">
                                        <form action="/users/edit" method="POST">
                                            <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                                            <button name="set_user" class="font-medium text-indigo-600 hover:text-indigo-500  border rounded border-indigo-200 p-2">Set as User</button>
                                        </form>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
