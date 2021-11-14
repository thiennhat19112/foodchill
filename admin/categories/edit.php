<?php
  include '../models/pdo.php';
  include '../models/categories.php';
  if(isset($_POST['btnthem'])== true){
    $category_id = $_POST['id'];
    $category_name = $_POST['tendm'];
    $ordinal_numbers = $_POST['vitri'];
    $status = $_POST['trangthai'];
    print_r($category_id);
    update_categories($category_id,$category_name,$ordinal_numbers,$status);
  }





?>

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Sửa Danh mục</h4>
      <form method="post" class="forms-sample">
        <div class="form-group">
          <label for="exampleInputName1">ID danh mục</label>
          <input type="text" value="<?php if (isset($category_id)) echo $category_id ?>" name="id" class="form-control" id="exampleInputName1" placeholder="Tên danh mục">
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Tên danh mục</label>
          <input type="text" value="<?php if (isset($category_name)) echo $category_name ?>"name="tendm" class="form-control" id="exampleInputName1" placeholder="Tên danh mục">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail3">Vị trí xuất hiện</label>
          <input type="text" value="<?php if (isset($ordinal_numbers)) echo $ordinal_numbers ?>" name="vitri" class="form-control" id="exampleInputEmail3" placeholder="Vị trí xuất hiện">
        </div>
        <div class="form-group">
          <label for="exampleSelectGender">Trạng thái</label>
          <select class="form-control" name="trangthai" id="exampleSelectGender">
            <option value="0">Hiện</option>
            <option value="1">Ẩn</option>
          </select>
        </div>
        <button type="submit" name="btnthem" class="btn btn-primary mr-2">Sửa</button>
        <a href="?v=categories&act=listCat" class="btn btn-light">Hủy</a>
      </form>
    </div>
  </div>
</div>