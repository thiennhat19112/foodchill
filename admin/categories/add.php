<?php
if (isset($_POST['btnthem'])) {
  $category_name = $_POST['tendm'];
  $ordinal_numbers = $_POST['vitri'];
  $status = $_POST['trangthai'];
  insert_categories($category_name, $ordinal_numbers, $status);
}
?>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Thêm Danh mục</h4>
      <form method="post" class="forms-sample">
        <div class="form-group">
          <label for="cateName">Tên danh mục</label>
          <input value="" type="text" name="tendm" class="form-control" id="cateName" placeholder="Tên danh mục">
        </div>
        <div class="form-group">
          <label for="cateOrdinal">Vị trí xuất hiện</label>
          <input type="text" name="vitri" value="" class="form-control" id="cateOrdinal" placeholder="Vị trí xuất hiện">
        </div>
        <div class="form-group">
          <label for="cateStatus">Trạng thái</label>
          <select class="form-control" name="trangthai" id="cateStatus">
            <option value="1">Hiện</option>
            <option value="0" checked>Ẩn</option>
          </select>
        </div>
        <a href="?v=categories&act=listCat"><input type="submit" name="btnthem" value="Thêm" class="btn btn-primary mr-2"></a>
        <a href="?v=categories&act=listCat" class="btn btn-light">Cancel</a>
      </form>
    </div>
  </div>
</div>