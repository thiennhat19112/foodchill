<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-9 col-sm-12 mb-5">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labbelledby="profile-tab">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10 col-sm-12">
                        <h4> Thông tin khách hàng </h4>
                        <hr />
                        <form class="form-row" method="post">
                            <input type="hidden" id="userId" value="blue">
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="username">Tên khách hàng</label>
                                <input class="form-control" readonly="readonly" id="username" value="<?=$_SESSION["username"]?>">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="email">Email</label>
                                <input readonly="readonly" class="form-control" id="email" value="<?=$_SESSION["email"]?>">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="password">Mật khẩu cũ</label>
                                <input type="password" class="form-control" id="password_cur">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="password">Mật khẩu mới</label>
                                <input type="password" class="form-control" id="password_new">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="password">Nhập lại mật khẩu mới</label>
                                <input type="password" class="form-control" id="password_conf">
                            </div>
                            <input type="text" hidden class="form-control" value="<?=$_SESSION["u_id"]?>" id="user_id">
                        </form>
                        <button disabled class="btn btn-primary btn-block submit" id="saveProfile" >Cập nhật</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>