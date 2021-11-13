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
                    <div class="form-group relative">
                        <label>Hình đại diện</label>
                        <input type="file" name="" class="dropify" data-max-file-size="2M" data-max-height="2000" data-default-file="https://cdn.vox-cdn.com/thumbor/R0gjxzdZsHHv0Km21KdLNaDWsVQ=/0x0:2048x870/920x613/filters:focal(729x260:1055x586):format(webp)/cdn.vox-cdn.com/uploads/chorus_image/image/70106450/Vi_fight.0.jpeg">
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