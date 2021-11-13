<?php
 if (isset($_POST['btnthem'])==true) {
    $category_name = $_POST['tendm'];
    $ordinal_numbers = $_POST['vitri'];
    $status = $_POST['trangthai'];
    insert_categories($category_name, $ordinal_numbers,$status);
 }
?>

<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Thêm Danh mục</h4>
                  <form method="post" class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">Tên danh mục</label>
                      <input value="" type="text" name="tendm" class="form-control" id="exampleInputName1" placeholder="Tên danh mục">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Vị trí xuất hiện</label>
                      <input type="text" name="vitri" class="form-control" id="exampleInputEmail3" placeholder="Vị trí xuất hiện">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Trạng thái</label>
                        <select class="form-control" name="trangthai" id="exampleSelectGender">
                          <option value="0">Hiện</option>
                          <option value="1">Ẩn</option>
                        </select>
                      </div>
                    <button type="submit" name="btnthem" class="btn btn-primary mr-2">Thêm</button>
                    <a href="?v=categories&act=listCat" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
            </div>