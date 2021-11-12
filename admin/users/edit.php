<div class="container px-6 mx-auto grid">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sửa Khách hàng</h4>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputName1">Tên Khách hàng</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Tên khách hàng">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Email</label>
                        <input type="email" class="form-control" id="exampleInputPassword4" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Mật khẩu</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Mật khẩu">
                    </div>
                    <div class="form-group">
                        <label>Hình đại diện</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                            <span class="relative hidden w-6 h-1 ml-3 md:block">
                                <img class="object-cover w-full h-full " src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                                <div class="absolute inset-0  shadow-inner" aria-hidden="true"></div>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Phân quyền</label>
                        <select class="form-control" id="exampleSelectGender">
                            <option>Admin</option>
                            <option>Shipper</option>
                            <option>Khách hàng</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Tình trạng</label>
                        <select class="form-control" id="exampleSelectGender">
                            <option>Ẩn</option>
                            <option>Hiện</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Sửa</button>
                    <a href="?v=user&act=listUser" class="btn btn-light">Hủy</a>
                </form>
            </div>
        </div>
    </div>
</div>