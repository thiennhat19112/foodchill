<div class="container mx-auto grid">
    <div class="overflow-hidden rounded-lg whitespace-wrap">
        <div class="w-full overflow-x-auto">
            <h2 class="my-6 text-2xl font-semibold">
                Khách hàng
            </h2>
            <table class="w-full whitespace-wrap myTable">
                <thead>
                    <tr class="text-xs font-semibold whitespace-no-wrap tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-3 py-3">id Khách hàng</th>
                        <th class="px-3 py-3">Tên Khách hàng</th>
                        <th class="px-3 py-3">Email</th>
                        <th class="px-3 py-3">password</th>
                        <th class="px-3 py-3">Phân quyền</th>
                        <th class="px-3 py-3">Status</th>
                        <th class="px-3 py-3">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <?php
                    foreach ($items as $item) {
                        extract($item);


                    ?>
                        <tr id="user-tr<?= $user_id ?>" class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                <?= $user_id ?>
                            </td>

                            <td class="px-3 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->

                                    <div>
                                        <p class="font-semibold"><?= $user_name ?></p>
                                    </div>
                                </div>
                            </td>

                            <td><?= $email ?></td>
                            <td><?= $password ?></td>
                            <td class="px-3 py-3 whitespace-wrap text-xs">
                                <?php if ($permission == 1) {
                                    echo '<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full ">
                                        Admin
                                    </span>';
                                } else if ($permission == 0) {
                                    echo  '<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full ">
                                            User
                                        </span>';
                                } else {
                                    echo   '<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full ">
                                            Shipper
                                        </span>';
                                }
                                ?>
                            </td>
                            <td class="px-3 py-3 text-xs">
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
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <!-- sưa -->
                                    <a href="?v=user&act=editUser&id=<?= $user_id ?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                    <!-- xóa -->
                                    <a href="javascript:void(0)" data-user_id="<?= $user_id ?>" class="delete-user flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
        </div>
        </td>
        </tr>
    <?php } ?>
    </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('.delete-user').click(function() {
                var id = $(this).data('user_id')
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
                                    'user_id': id
                                },
                                success: function(data) {
                                    swal({
                                        title: 'Bạn đã xóa thành công',
                                        icon: 'success',
                                        buttons: 'Đóng',
                                    }).then(() => {
                                        $('#user-tr' + id).hide()
                                    })

                                }
                            })

                        } else {
                           
                        }
                    })
            })
        })
    </script>
    </div>
</div>
</div>