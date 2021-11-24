<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">

    <!-- Table order-->
<div class="w-full mx-3 overflow-hidden rounded-lg">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Hóa đơn
    </h2>
    <div class="w-full overflow-x-auto">
        <table class="w-full  whitespace-no-wrap orders-table">
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
               
            
            <tbody class="bg-white divide-y ">
                <?php foreach ($items as $item) {
                    extract($item);
                ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-1 py-3">
                            <!-- tên khách hàng -->
                            <div class="flex items-center text-sm">
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
                        <td class="px-1 py-3 text-xs status">
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
        <script>
          $(document).ready(function(){
            setInterval(reload_status,1000)
            function reload_status() {
              $(".orders-table").load("ajax/ajax_reload_ordersTable.php")
            }
           
          })
        </script>
    </div>
</div>

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