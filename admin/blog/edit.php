<?php
$image_old = $image;
if (isset($_POST['editBlog'])) {
    $blog_id = $_POST['blog_id'];
    $title = $_POST['title'];
    $target = '../upload/images/blog/';
    $image = $_FILES['image']['name'];
    //upload ảnh
    if($image !=""){
        $target = '../upload/images/blog/';
        // Rename file
        $newName = stringProcessor($product_name)."-".time();
        $imageFileType = strtolower(pathinfo(basename($_FILES["image"]["name"]), PATHINFO_EXTENSION));
        $image = $newName .".". $imageFileType;
        //upload ảnh
        $image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_tmp, $target . $image);
        // Delete old image
        unlink("../upload/images/blog/".$image_old);
    }else{
        $image = $image_old;
    }

    $descriptions = $_POST['descriptions'];
    $user_id = $_SESSION["u_id"];
    $content = $_POST['content'];
    $status = $_POST['status'];
    update_blog($title, $image, $descriptions,$user_id,$content ,$status,$blog_id);

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
                <h4 class="card-title">Sửa bài viết</h4>
                <form method="post" enctype="multipart/form-data" class="forms-sample">
                <div class="form-group">
                        <label for="blog_id">ID bài viết</label>
                        <input type="text" value="<?=$blog_id?>" name="blog_id" class="form-control" id="blog_id" placeholder="ID bài viết">
                    </div>
                    <div class="form-group">
                        <label for="title">Tiêu đề</label>
                        <input type="text" value="<?=$title?>" name="title" class="form-control" id="title" placeholder="Tiêu đề">
                    </div>
                    <div class="form-group">
                        <label for="descriptions">Mô tả</label>
                        <textarea  name="descriptions" class="form-control" id="descriptions" placeholder="Mô tả"><?=$descriptions?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Image">Hình ảnh</label>
                        <input type="file" name="image" data-max-file-size="2M" data-max-height="2000" class="dropify" data-default-file="../upload/images/blog/<?= $image ?>" id="Image">
                        <?php if($image!=""){
                            echo '<span name="image_old" value = "'.$image.'"></span>';
                        }?>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Nội dung chi tiết</label>
                        <textarea class="form-control ck-editor__editable_inline" name="content" id="mota" rows="4"><?=$content?></textarea>
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
                    <input type="submit" name="editBlog" class="btn btn-primary mr-2" value="Sửa">
                    <a href="?v=blogs&act=listBlogs" class="btn btn-light">Hủy</a>
                </form>
            </div>
        </div>
    </div>
</div>