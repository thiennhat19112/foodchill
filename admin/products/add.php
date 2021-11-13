
<div class="container px-6 mx-auto grid">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm sản phẩm</h4>
                <form method="post" class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputName1">Tên sản phẩm</label>
                        <input type="text" name="tensp" class="form-control" id="exampleInputName1" placeholder="Tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Số lượng</label>
                        <input type="text" name="soluong" class="form-control"  placeholder="Số lượng">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Giá</label>
                        <input type="text" name="gia" class="form-control"  placeholder="Giá">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Khối lượng</label>
                        <input type="password" name="khoiluong" class="form-control" id="exampleInputPassword4" placeholder="Khối lượng">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Danh mục</label>
                        <select class="form-control" name="danhmuc" id="exampleSelectGender">
                            <option value="0">Male</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="" data-max-file-size="2M" data-max-height="2000" class="dropify">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Khuyến mãi</label>
                        <input type="text" name="khuyenmai" class="form-control" id="exampleInputCity1" placeholder="Khuyến mãi">
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Mô tả</label>
                        <textarea class="form-control" name="mota" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Tình trạng</label>
                        <select class="form-control" name="tinhtrang" id="exampleSelectGender">
                            <option value="0">Male</option>
                        </select>
                    </div>
                    <button type="submit" name="btnthêm" class="btn btn-primary mr-2">Thêm</button>
                    <a href="?v=product&act=listProd"class="btn btn-light">Hủy</a>
                </form>
            </div>
        </div>
    </div>
</div>