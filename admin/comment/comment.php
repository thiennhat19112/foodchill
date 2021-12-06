<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 ">
        Bình luận
    </h2>
    <script>
        $(document).ready(function() {
            $('#comment-table').on('click', '.delete-comment', function() {
                var id = $(this).data('comment_id')
                swal({
                        title: "Bạn có muôn xóa?",
                        text: "",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: 'POST',
                                url: 'models/ajax_action.php',
                                data: {
                                    'comment_id': id,
                                },
                                success: function(data) {
                                    swal({
                                        title: 'Bạn đã xóa thành công',
                                        icon: 'success',
                                        buttons: 'Đóng',
                                    }).then(() => {
                                        $('#comment-tr' + id).hide()
                                        window.location.reload(true)
                                    })

                                }
                            })

                        } else {

                        }
                    })

            })

        })
    </script>
    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table id = "comment-table" class="w-full whitespace-wrap myTable">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 whitespace-no-wrap">
                        <th class="px-4 py-3">Khách hàng</th>
                        <th class="px-4 py-3">Bình luận</th>
                        <th class="px-4 py-3">Ngày bình luận</th>
                        <th class="px-4 py-3">Sản phẩm bình luận</th>
                        <th class="px-4 py-3">Trạng thái</th>
                        <th class="px-4 py-3">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y ">
                    <?php
                    foreach ($items as $item) {
                        extract($item);
                    ?>
                        <tr id="comment-tr<?= $comment_id ?>" class="text-gray-700 ">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold whitespace-no-wrap"><?= $user_name ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?= $comment_content ?> </td>
                            <td class="px-4 py-3 text-sm">
                                <?= date('d-m-Y', strtotime($create_date)); ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?= $product_name ?>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <?php if ($status == '0') {
                                    echo ' <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                            Đang giao
                            </span>';
                                } else if ($status == '1') {
                                    echo '<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    Hiện
                                    </span>';
                                } else {
                                    echo '<span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                    Ẩn
                                    </span>';
                                }
                                ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <a href="javascript:void(0)" data-comment_id="<?= $comment_id ?>" class="delete-comment flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg  focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>