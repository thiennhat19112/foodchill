<?php
require("../models/pdo.php");
require("../models/ship.php");
$items = select_all_orders(); ?>
<div class="shoping__cart__table shipping-table">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Người Nhận</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ghi chú khách hàng</th>
                <th>Ghi chú admin</th>
                <th>Thành tiền</th>
                <th>Tình trạng</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($items as $item) {
                extract($item);
            ?>
                <td><?= $receiver ?></td>
                <td><?= $phone ?></td>
                <td><?= $address ?></td>
                <td><?= $receiver_note ?></td>
                <td><?= $admin_note ?></td>
                <td><?= number_format($total_amount, 0, ',', '.') ?></td>
                <td><?php
                    if ($status == 0) {
                        echo '<a href="javascript:void(0)" data-order-id="' . $order_id . '" id="shipping" class="btn waves-effect waves-light btn-block btn-success">Xác nhận giao hàng</a>';
                    } elseif ($status == 1) {
                        echo '<a href="javascript:void(0)" disabled="true" class="btn waves-effect waves-light btn-block btn-success">Đã giao</a>';
                    } else {
                        echo '<a href="javascript:void(0)" disabled="true" class="btn waves-effect waves-light btn-block btn-success">Đã hủy</a>';
                    }
                    ?></td>
            <?php } ?>
        </tbody>
    </table>
</div>