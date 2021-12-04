<?php
    $image_old = $image;

    if (isset($_POST['editProduct']))
    {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $weight = $_POST['weight'];
        $description = $_POST['description'];
        $infomation = $_POST['infomation'];
        $image = $_FILES['image']['name'];
        if($image_old != $image){
            $target = '../upload/images/products/';
            $image =$_FILES['image']['name'];
            // Upload new image
            $image_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($image_tmp,$target.$image);
            // Delete old image
            unlink("../".$image_old);

            $image = 'upload/images/products/'.$image;
        }else{
            $image = $image_old;
        }
        
        $category_id = $_POST['category_id'];
        $discount = $_POST['discount'];
        $status = $_POST['status'];
        update_product($product_name, $quantity, $price, $weight, $description, $infomation, $image,  $category_id, $discount, $status, $product_id);
        echo '<script>swal({
            title: "Sửa thành công",
            icon: "success",
            button: "Đóng",
        });</script>';
    }
    
?>
<div class="container px-6 mx-auto grid">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sửa sản phẩm</h4>
                <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="prodId">ID sản phẩm</label>
                        <input type="text" value="<?= $product_id ?>" name="product_id" class="form-control" id="prodId" placeholder="ID sản phẩm" readonly>
                    </div>
                    <div class="form-group">
                        <label for="prodName">Tên sản phẩm</label>
                        <input type="text" name = "product_name" value="<?= $product_name ?>" class="form-control" id="prodName" placeholder="Tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="prodQuantity">Số lượng</label>
                        <input type="number" min="0" name = "quantity" value="<?= $quantity ?>" class="form-control" id="prodQuantity" placeholder="Số lượng">
                    </div>
                    <div class="form-group">
                        <label for="prodPrice">Giá</label>
                        <input type="number" min="1000" name = "price" value="<?= $price ?>" class="form-control" id="prodPrice" placeholder="Giá">
                    </div>
                    <div class="form-group">
                        <label for="prodWeight">Khối lượng</label>
                        <input type="text" name = "weight" value="<?= $weight ?>" class="form-control" id="prodWeight" placeholder="Khối lượng">
                    </div>
                    <div  class="form-group">
                        <label for="prodCate">Danh mục</label>
                        <select name ="category_id" class="form-control" id="prodCate">
                            <?php 
                                foreach ($items_categories as $va) {
                                    if($va['category_id'] == $category_id){
                                        echo '
                                            <option value="'.$va['category_id'].'" selected>'.$va['category_name'].'</option>
                                        ';
                                    } else {
                                        echo '
                                            <option value="'.$va['category_id'].'">'.$va['category_name'].'</option>
                                        ';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prodImage">Hình ảnh</label>
                        <input type="file" name="image" class="dropify" data-max-file-size="2M" data-max-height="2000" data-default-file="../<?= $image ?>" id="prodImage">
                        <?php if($image!=""){
                            echo '<span name="image_old" value = "'.$image.'"></span>';
                        }?>
                        
                    </div>
                    <div class="form-group">
                        <label for="prodDiscount">Giảm giá</label>
                        <input type="number" min="0" name="discount" value="<?= $discount ?>" class="form-control" id="prodDiscount" placeholder="Giảm giá">
                    </div>
                    <div class="form-group">
                        <label for="prodDescrip">Mô tả</label>
                        <textarea class="form-control ck-editor__editable_inline" name="description" id="prodDescrip" rows="4"><?=$description?></textarea>
                        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#prodDescrip'))
                                .then(editor => {
                                    console.log(editor);
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                    </div>
                    <div class="form-group">
                        <label for="prodInfo">Thông tin</label>
                        <textarea class="form-control ck-editor__editable_inline" name="infomation" id="prodInfo" rows="4"><?=$infomation?></textarea>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#prodInfo'))
                                .then(editor => {
                                    console.log(editor);
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                    </div>
                    <div class="form-group">
                        <label for="prodStatus">Trạng thái</label>
                        <select name="status" class="form-control" id="prodStatus">
                            <option value="1">Hiện</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                    <button type="submit" name="editProduct" class="btn btn-primary mr-2">Sửa</button>
                    <a href="?v=product&act=listProd" class="btn btn-light">Hủy</a>
                </form>
            </div>
        </div>
    </div>
</div>