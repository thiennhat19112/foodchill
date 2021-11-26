<div class="container px-6 mx-auto grid">
    <div class="w-full overflow-hidden rounded-lg  card-body">
        <div class="w-full overflow-x-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Danh mục
            </h2>
            <table class=" w-full whitespace-no-wrap myTable">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">ID danh mục</th>
                        <th class="px-4 py-3">Tên danh mục</th>
                        <th class="px-4 py-3">Vị trí</th>
                        <th class="px-4 py-3">Trạng thái</th>
                        <th class="px-4 py-3">Thao tác</th>
                    </tr>
                </thead>



                <tbody class="table-categories bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <?PHP
                    foreach ($items as $item) {
                        extract($item);
                    ?>
                        <tr id ="category-tr<?=$category_id?>" class=" text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                <?= $category_id ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?= $category_name ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?= $ordinal_number ?>
                            </td>
                            <td class=" px-4 py-3 text-xs">
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
                                    <a href="?v=categories&act=editCat&id=<?= $category_id ?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                    <!-- xóa -->
                                    <a href="javascript:void(0)" data-catrgoty_id="<?= $category_id ?>" class="delete-category flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
            <script>
                $(document).ready(function() {
                    $('.delete-category').click(function() {
                        if (confirm('Are you sure you want to delete')) {
                            var id = $(this).data('catrgoty_id')
                            $.ajax({
                                type: 'POST',
                                url: 'models/ajax_action.php',
                                data: {
                                    'category_id': id
                                },
                                success: function(data) {
                                    $('#category-tr'+id).hide()
                                }
                            })
                        }

                    })

                })
            </script>
        </div>
        </div>
    </div>
</div>