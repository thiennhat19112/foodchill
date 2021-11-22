<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 ">
      Dashboard
    </h2>
    <!-- features -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs ">
        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full ">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 ">
            Tổng khách hàng
          </p>
          <p class="text-lg font-semibold text-gray-700 ">
            6389
          </p>
        </div>
      </div>
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs ">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full d">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 ">
            Tổng doanh thu
          </p>
          <p class="text-lg font-semibold text-gray-700 ">
            $ 46,760.89
          </p>
        </div>
      </div>
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs ">
        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full ">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 ">
            Sản phẩm mới bán
          </p>
          <p class="text-lg font-semibold text-gray-700 ">
            376
          </p>
        </div>
      </div>
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs ">
        <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full ">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 ">
            Tin nhắn
          </p>
          <p class="text-lg font-semibold text-gray-700 ">
            35
          </p>
        </div>
      </div>
    </div>

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
      <!-- Lines chart -->
      <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs ">
        <h4 class="mb-4 font-semibold text-gray-800 ">
          Khách hàng đã đăng kí 
        </h4>
        <canvas id="line"></canvas>
      </div>
    </div>
  </div>
</main>