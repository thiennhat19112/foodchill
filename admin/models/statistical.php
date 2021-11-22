<?php
require("pdo.php");
//lấy tổng doanh thu từ hóa đơn
function select_all_total_amount1()
{
        $sql = "SELECT SUM(total_amount) FROM orders WHERE 0 = DATEDIFF(SUBDATE(CURDATE(),0),shipping_date)";
        return pdo_query_one($sql);
}

function select_all_total_amount2()
{
        $sql = "SELECT SUM(total_amount) FROM orders WHERE 0 = DATEDIFF(SUBDATE(CURDATE(),1),shipping_date)";
        return pdo_query_one($sql);
}

function select_all_total_amount3()
{
        $sql = "SELECT SUM(total_amount) FROM orders WHERE 0 = DATEDIFF(SUBDATE(CURDATE(),2),shipping_date)";
        return pdo_query_one($sql);
}

function select_all_total_amount4()
{
        $sql = "SELECT SUM(total_amount) FROM orders WHERE 0 = DATEDIFF(SUBDATE(CURDATE(),3),shipping_date)";
        return pdo_query_one($sql);
}

function select_all_total_amount5()
{
        $sql = "SELECT SUM(total_amount) FROM orders WHERE 0 = DATEDIFF(SUBDATE(CURDATE(),4),shipping_date)";
        return pdo_query_one($sql);
}

function select_all_total_amount6()
{
        $sql = "SELECT SUM(total_amount) FROM orders WHERE 0 = DATEDIFF(SUBDATE(CURDATE(),5),shipping_date)";
        return pdo_query_one($sql);
}

function select_all_total_amount7()
{
        $sql = "SELECT SUM(total_amount) FROM orders WHERE 0 = DATEDIFF(SUBDATE(CURDATE(),6),shipping_date)";
        return pdo_query_one($sql);
}

//lấy giá trị trong function
$item1 = select_all_total_amount1();
$val1 = $item1['SUM(total_amount)'];

$item2 = select_all_total_amount2();
$val2 = $item2['SUM(total_amount)'];

$item3 = select_all_total_amount3();
$val3 = $item3['SUM(total_amount)'];

$item4 = select_all_total_amount4();
$val4 = $item4['SUM(total_amount)'];


$item5 = select_all_total_amount5();
$val5 = $item5['SUM(total_amount)'];

$item6 = select_all_total_amount6();
$val6 = $item6['SUM(total_amount)'];

$item7 = select_all_total_amount7();
$val7 = $item7['SUM(total_amount)'];

$result = array(
    'ngay 1' => $val1,
    'ngay 2' => $val2,
    'ngay 3' => $val3,
    'ngay 4' => $val4,
    'ngay 5' => $val5,
    'ngay 6' => $val6,
    'ngay 7' => $val7,
);
echo json_encode($result);


