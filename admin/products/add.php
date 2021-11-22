<?php
if (isset($_POST['addProduct'])) {
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $descriptions = $_POST['descriptions'];
    $weight = $_POST['weight'];
    $target = '../upload/images/';
    $image = $_FILES['image']['name'];
    //upload ảnh
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp, $target . $image);

    $category_id = $_POST['category_id'];
    $discount = $_POST['discount'];
    $saled = 0;
    $view = 0;
    $rating = 0;
    $status = $_POST['status'];
    insert_product($product_name, $quantity, $price, $weight, $descriptions, $image,  $category_id, $discount, $saled, $view, $rating, $status);
}

?>
<div class="container px-6 mx-auto grid">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm sản phẩm</h4>
                <form method="post" enctype="multipart/form-data" class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputName1">Tên sản phẩm</label>
                        <input type="text" name="product_name" class="form-control" id="exampleInputName1" placeholder="Tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Số lượng</label>
                        <input type="text" name="quantity" class="form-control" placeholder="Số lượng">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Giá</label>
                        <input type="text" name="price" class="form-control" placeholder="Giá">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Khối lượng</label>
                        <input type="text" name="weight" class="form-control" id="exampleInputPassword4" placeholder="Khối lượng">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Danh mục</label>
                        <select class="form-control" name="category_id">
                            <?php foreach ($items as $item) {
                                extract($item);
                            ?>
                                <option value="<?= $category_id ?>"><?= $category_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="image" data-max-file-size="2M" data-max-height="2000" class="dropify">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Khuyến mãi</label>
                        <input type="text" name="discount" class="form-control" id="exampleInputCity1" placeholder="Khuyến mãi">
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Mô tả</label>
                        <textarea class="form-control ck-editor__editable_inline" name="descriptions" id="mota" rows="4"></textarea>
                        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#mota'))
                                .then(editor => {
                                    console.log(editor);
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Tình trạng</label>
                        <select class="form-control" name="status" id="exampleSelectGender">
                            <option value="1">Hiện</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                    <input type="submit" name="addProduct" class="btn btn-primary mr-2" value="Thêm">
                    <a href="?v=product&act=listProd" class="btn btn-light">Hủy</a>
                </form>
            </div>
        </div>
    </div>
</div>