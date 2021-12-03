<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">

        <!-- Table order-->
        <div class="w-full mx-3 overflow-hidden rounded-lg">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Hóa đơn
            </h2>
            <div class="w-full overflow-x-auto">
                <table class="w-full orders-table myTable">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-2 py-3">Khách hàng</th>
                            <th class="px-2 py-3">Tổng tiền</th>
                            <th class="px-2 py-3">Người nhận</th>
                            <th class="px-2 py-3">Địa chỉ</th>
                            <th class="px-2 py-3">Số điện thoại</th>
                            <th class="px-2 py-3">Tình trạng</th>
                            <th class="px-2 py-3">Ngày đặt hàng</th>
                            <th class="px-2 py-3">Ngày giao</th>
                            <th class="px-2 py-3">Ghi chú khách hàng</th>
                            <th class="px-2 py-3">Ghi chú admin</th>
                            <th class="px-2 py-3">Chi tiết hóa đơn</th>
                        </tr>
                    </thead>


                    <tbody class="bg-white divide-y ">
                        <?php foreach ($items as $item) {
                            extract($item);
                        ?>
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-2 py-3">
                                    <!-- tên khách hàng -->
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold "><?= $user_name ?></p>
                                        </div>
                                    </div>
                                </td>
                                <!-- Giá -->
                                <td class="px-2 py-3 text-sm whitespace-no-wrap">
                                    <?= number_format($total_amount, 0, ',', '.') ?>VND
                                </td>
                                <!-- Tên người nhận -->
                                <td class="px-2 py-3 text-sm">
                                    <?= $receiver ?>
                                </td>
                                <!-- Địa điểm -->
                                <td class="px-2 py-3 text-sm">
                                    <?= $address ?>
                                </td>
                                <!-- sdt -->
                                <td class="px-2 py-3 text-sm">
                                    <?= $phone ?>
                                </td>
                                <!-- tình trạng -->
                                <td class="px-2 py-3 text-xs status whitespace-no-wrap">
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
                                <td class="px-2 py-3 text-sm whitespace-no-wrap">
                                    <?= date('d-m-Y', strtotime($order_date)); ?>
                                </td>
                                <!-- Ngày giao -->
                                <td class="px-2 py-3 text-sm whitespace-no-wrap">
                                    <?php if ($shipping_date == '') {
                                        echo '';
                                    } else {
                                        echo date('d-m-Y', strtotime($shipping_date));
                                    }
                                    ?>
                                </td>
                                <!-- ghi chú khách hàng -->
                                <td class="px-2 py-3 text-sm">
                                    <?= $receiver_note ?>
                                </td>
                                <!-- ghi chú admin -->
                                <td class="px-2 py-3 text-sm">
                                    <?= $admin_note ?>
                                </td>
                                <td>
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="javascript:void(0)" data-order-id="<?= $order_id ?>" class="order-details flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                                            <!-- chi tiết hóa đơn-->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
        <div class=" overflow-x-auto modal">
            <table class="order-details inset-1/2">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-2 py-3">Tên sản phẩm</th>
                        <th class="px-2 py-3">Số lượng</th>
                        <th class="px-2 py-3">Giá sản phẩm</th>
                        <th class="px-2 py-3">Tổng giá sản phẩm</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y " id="table-order-details">
                </tbody>
            </table>
        </div>
        <script>
            $(document).ready(function() {
                $('.order-details').click(function() {
                    var id = $(this).data('order-id')
                    $.ajax({
                        type: 'POST',
                        url: 'models/ajax_action.php',
                        dataType: "json",
                        data: {
                            'order_id': id
                        },
                        success: function(data) {
                            console.log(data)
                            $('#table-order-details').html('')
                            for (var i = 0; i < data.length; i++) {
                                val = data[i]
                                var orderDetails_str =
                                    `<tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-2 py-3 text-sm">
                                            ${val['product_name']}
                                        </td>
                                        <td class="px-2 py-3 text-sm">
                                            ${val['quantity']}
                                        </td>
                                        <td class="px-2 py-3 text-sm">
                                            ${val['price']}
                                        </td>
                                        <td class="px-2 py-3 text-sm">
                                            ${val['total_price']}
                                        </td>
                                    </tr>`
                                $('#table-order-details').append(orderDetails_str)
                            }
                            $('.modal').fadeIn().show()
                        }
                    })
                })

            })
        </script>
        <!-- Charts -->
        <h2 class="my-6 text-2xl font-semibold text-gray-700 ">
            Thống kê
        </h2>
        <div class="grid gap-6 mb-8 md:grid-cols-2">
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs ">
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Doanh thu trong tuần
                </h4>
                <canvas id="bars"></canvas>
            </div>
        </div>
    </div>
</main>