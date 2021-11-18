<?php
    $image_old = $image;
    if (isset($_POST['editProduct']))
    {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $descriptions = $_POST['descriptions'];
        $weight = $_POST['weight'];
        if($image_old ==""){
            $target = '../upload/images/';
            $image =$_FILES['image']['name'];
            //upload ảnh
            $image_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($image_tmp,$target.$image);
        }else{
            $image = $image_old;
        }
        

        $category_id = $_POST['category_id'];
        $discount = $_POST['discount'];
        $status = $_POST['status'];
        update_product($product_name, $quantity, $price, $weight, $descriptions, $image,  $category_id, $discount, $status, $product_id);
    }

?>
<div class="container px-6 mx-auto grid">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sửa sản phẩm</h4>
                <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputName1">ID sản phẩm</label>
                        <input type="text" value="<?= $product_id ?>" name="product_id"class="form-control"  placeholder="ID sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Tên sản phẩm</label>
                        <input type="text" name = " product_name" value="<?= $product_name ?>" class="form-control"  placeholder="Tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Số lượng</label>
                        <input type="text" name = "quantity" value="<?= $quantity ?>" class="form-control" " placeholder="Số lượng">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Giá</label>
                        <input type="text" name = "price" value="<?= $price ?>" class="form-control"  placeholder="Giá">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Khối lượng</label>
                        <input type="text" name = "weight" value="<?= $weight ?>" class="form-control" id="exampleInputPassword4" placeholder="Khối lượng">
                    </div>
                    <div  class="form-group categories">
                        <label for="exampleSelectGender">Danh mục</label>
                        <select name = "category_id" class="form-control categories" >
                            <?php foreach ($items_categories as $item) {
                                extract($item);
                            ?>
                                <option  class="category-id-<?= $category_id ?>" value="<?= $category_id ?>"><?= $category_name ?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="image" class="dropify" data-max-file-size="2M" data-max-height="2000" data-default-file="../upload/images/<?= $image ?>">
                        <?php if($image!=""){
                            echo '<span name="image_old" value = "'.$image.'"></span>';
                        }?>
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Khuyến mãi</label>
                        <input type="text" name="discount" value="<?= $discount ?>" class="form-control" id="exampleInputCity1" placeholder="Khuyến mãi">
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Mô tả</label>
                        <textarea class="form-control" name="descriptions" <?= $descriptions ?> id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Tình trạng</label>
                        <select name="status" class="form-control" id="exampleSelectGender">
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