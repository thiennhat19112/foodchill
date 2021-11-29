<?php
if (isset($_POST['btnthem']) == true) {
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $permission = $_POST['phanquyen'];
    $status = $_POST['status'];
    insert_user($user_name, $email, $password, $permission, $status);

    echo '<script>swal({
        title: "Thêm thành công",
        icon: "success",
        button: "Đóng",
      });</script>';
}
?>
<div class="container px-6 mx-auto grid">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm Khách hàng</h4>
                <form method="post" class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputName1">Tên Khách hàng</label>
                        <input type="text" name="user_name" class="form-control" id="exampleInputName1" placeholder="Tên khách hàng">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputPassword4" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" id="exampleInputCity1" placeholder="Mật khẩu">
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectGender">Phân quyền</label>
                        <select class="form-control" name="phanquyen" id="exampleSelectGender">
                            <option value="1">Admin</option>
                            <option value="2">Shipper</option>
                            <option value="0">Khách hàng</option>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Tình trạng</label>
                        <select class="form-control" name="status" id="exampleSelectGender">
                            <option value="1">Hiện</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                    <button type="submit" name="btnthem" class="btn btn-primary mr-2">Thêm</button>
                    <a href="?v=user&act=listUser" class="btn btn-light">Hủy</a>
                </form>
            </div>
        </div>
    </div>
</div>