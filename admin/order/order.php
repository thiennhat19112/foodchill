<!-- Table order-->
<div class="w-full mx-3 overflow-hidden rounded-lg">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Hóa đơn
    </h2>
    <div class="w-full overflow-x-auto">
        <table class="w-full  whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-1 py-3">Khách hàng</th>
                    <th class="px-1 py-3">Tổng tiền</th>
                    <th class="px-1 py-3">Người nhận</th>
                    <th class="px-1 py-3">Địa chỉ</th>
                    <th class="px-1 py-3">Số điện thoại</th>
                    <th class="px-1 py-3">Tình trạng</th>
                    <th class="px-1 py-3">Ngày đặt hàng</th>
                    <th class="px-1 py-3">Ngày giao</th>
                    <th class="px-1 py-3">Ghi chú khách hàng</th>
                    <th class="px-1 py-3">Ghi chú admin</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php foreach ($items as $item) {
                    extract($item);
                ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-1 py-3">
                            <!-- tên khách hàng -->
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full" src="../upload/images/<?= $image ?>" alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p class="font-semibold"><?= $user_name ?></p>
                                </div>
                            </div>
                        </td>
                        <!-- Giá -->
                        <td class="px-1 py-3 text-sm">
                            <?= $total_amount ?>
                        </td>
                        <!-- Tên người nhận -->
                        <td class="px-1 py-3 text-sm">
                            <?= $receiver ?>
                        </td>
                        <!-- Địa điểm -->
                        <td class="px-1 py-3 text-sm">
                            <?= $address ?>
                        </td>
                        <!-- sdt -->
                        <td class="px-1 py-3 text-sm">
                            <?= $phone ?>
                        </td>
                        <!-- tình trạng -->
                        <td class="px-1 py-3 text-xs">
                            <?php if ($status == '0') {
                                echo ' <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                            Đang giao
                            </span>';
                            } else if ($status == '1') {
                                echo '<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    Đã giao
                                    </span>';
                            } else {
                                echo '<span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                    Đã hủy
                                    </span>';
                            }
                            ?>
                        </td>
                        <!-- ngày đặt -->
                        <td class="px-1 py-3 text-sm">
                            <?= $order_date ?>
                        </td>
                        <!-- Ngày giao -->
                        <td class="px-1 py-3 text-sm">
                            <?= $shipping_date ?>
                        </td>
                        <!-- ghi chú khách hàng -->
                        <td class="px-1 py-3 text-sm">
                            <?= $receiver_note ?>
                        </td>
                        <!-- ghi chú admin -->
                        <td class="px-1 py-3 text-sm">
                            <?= $admin_note ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="grid px-1 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        <span class="flex items-center col-span-3">
            Showing 21-30 of 100
        </span>
        <span class="col-span-2"></span>
        <!-- Pagination -->
        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            <nav aria-label="Table navigation">
                <ul class="inline-flex items-center">
                    <li>
                        <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                            <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </li>
                    <li>
                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                            1
                        </button>
                    </li>
                    <li>
                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                            2
                        </button>
                    </li>
                    <li>
                        <button class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                            3
                        </button>
                    </li>
                    <li>
                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                            4
                        </button>
                    </li>
                    <li>
                        <span class="px-3 py-1">...</span>
                    </li>
                    <li>
                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                            8
                        </button>
                    </li>
                    <li>
                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                            9
                        </button>
                    </li>
                    <li>
                        <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                            <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </li>
                </ul>
            </nav>
        </span>
    </div>
</div>