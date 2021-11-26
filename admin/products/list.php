<div class="container px-6 mx-auto grid">
    <div class="w-full overflow-hidden rounded-lg ">
        <div class="w-full overflow-x-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Sản phẩm
            </h2>
            <table  class="w-full whitespace-wrap table-bordered text-center myTable">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 whitespace-no-wrap uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-1 py-3">Tên sản phẩm</th>
                        <th class="px-1 py-3">Giá</th>
                        <th class="px-1 py-3">Số lượng</th>
                        <th class="px-1 py-3">Khối lượng</th>
                        <th class="px-1 py-3">Mô tả</th>
                        <th class="px-1 py-3">Thông tin</th>
                        <th class="px-1 py-3">Thêm ngày</th>
                        <th class="px-1 py-3">Giảm giá</th>
                        <th class="px-1 py-3">Đã bán</th>
                        <th class="px-1 py-3">Lượt xem</th>
                        <th class="px-1 py-3">Trạng thái</th>
                        <th class="px-1 py-3">Đánh giá</th>
                        <th class="px-1 py-3">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <?php foreach ($items as $item) {
                        extract($item);
                    ?>
                        <tr id="product-tr<?= $product_id ?>" class="text-gray-700 dark:text-gray-400">
                            <td class="px-1 py-3">
                                <!-- Tên sản phẩm -->
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full" src="../<?= $image ?>" alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold"><?= $product_name ?></p>
                                    </div>
                                </div>
                            </td>
                            <!-- Giá -->
                            <td class="px-1 py-3 text-sm whitespace-no-wrap">
                                <?= $price ?>
                            </td>
                            <!-- Số lượng -->
                            <td class="px-1 py-3 text-sm whitespace-no-wrap">
                                <?= $quantity ?>
                            </td>
                            <!-- Khối lượng -->
                            <td class="px-1 py-3 text-sm">
                                <?= $weight ?>
                            </td>
                            <!-- Mô tả -->
                            <td class="px-1 py-3">
                                <?= $description ?>
                            </td>
                            <!-- Thông tin -->
                            <td class="px-1 py-3">
                                <?= $infomation ?>
                            </td>
                            <!-- Thêm ngày -->
                            <td class="px-1 py-3 text-sm">
                                <?= $create_date ?>
                            </td>
                            <!-- Giảm giá -->
                            <td class="px-1 py-3 text-sm whitespace-no-wrap">
                                <?= $discount ?>
                            </td>
                            <!-- Đã bán -->
                            <td class="px-1 py-3 text-sm whitespace-no-wrap">
                                <?= $saled ?>
                            </td>
                            <!-- Lượt xem -->
                            <td class="px-1 py-3 text-sm whitespace-no-wrap">
                                <?= $view ?>
                            </td>
                            <!-- Trạng thái -->
                            <td class="px-1 py-3 text-xs">
                                <?php if ($status == '1') {
                                    echo '<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full ">
                                            Hiện
                                        </span>';
                                } else {
                                    echo '<span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full  ">
                                            Ẩn
                                        </span>';
                                }
                                ?>
                            </td>
                            <!-- đánh giá -->
                            <td class="px-1 py-3 text-sm whitespace-no-wrap">
                                <?= $rating ?>
                            </td>
                            <td class="px-1 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="?v=product&act=editProd&id=<?= $product_id ?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        <!-- sửa     -->
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                    <a href="javascript:void(0)" data-image="<?= $image ?>" data-product_id="<?= $product_id ?>" class="delete-product flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                        <!-- Xóa     -->
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <script>
                    $(document).ready(function() {
                        $('.delete-product').click(function() {
                            if (confirm('Are you sure you want to delete')) {
                                var id = $(this).data('product_id')
                                var img = $(this).data('image')
                                $.ajax({
                                    type: 'POST',
                                    url: 'models/ajax_action.php',
                                    data: {
                                        'product_id': id,
                                        'img': img
                                    },
                                    success: function(data) {
                                        $('#product-tr' + id).hide()
                                    }
                                })
                            }

                        })

                    })
                </script>
            </table>
        </div>
    </div>
</div>