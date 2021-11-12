<div class="container px-6 mx-auto grid">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sửa sản phẩm</h4>
                <form class="forms-sample">
                <div class="form-group">
                        <label for="exampleInputName1">ID sản phẩm</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="ID sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Số lượng</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Số lượng">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Giá</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Giá">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Khối lượng</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Khối lượng">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Danh mục</label>
                        <select class="form-control" id="exampleSelectGender">
                            <option>Male</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Khuyến mãi</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Khuyến mãi">
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Mô tả</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Tình trạng</label>
                        <select class="form-control" id="exampleSelectGender">
                            <option>Male</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Sửa</button>
                    <a href="?v=product&act=listProd" class="btn btn-light">Hủy</a>
                </form>
            </div>
        </div>
    </div>
</div>