<?php 
function insert_categories($category_name, $ordinal_numbers,$status){
    $sql="INSERT INTO  categories(category_name, ordinal_numbers,status) VALUES('$category_name' ,'$ordinal_numbers','$status')";
    pdo_execute($sql);
}


?>