<?php
$host_mysql="localhost";
$username_mysql="kent";
$password_mysql="12345678";
$database_mysql="shopdemo";
$link=mysqli_connect($host_mysql,$username_mysql,$password_mysql,$database_mysql) or die("伺服器忙線中，請稍後再試");

$sql_count = "SELECT COUNT(*) AS total FROM `account`";
$result_count = mysqli_query($link, $sql_count);
if ($result_count) {
    $row = mysqli_fetch_assoc($result_count);
    if ($row['total'] >= 60000) {
        echo "帳號數量已達到上限，無法新增更多帳號!";
        exit;
    }
};

$sql_check="SELECT accountName FROM `account` WHERE accountName='".$_POST['accountName']."'";
$result_check=mysqli_query($link,$sql_check);
if(mysqli_num_rows($result_check)) {
    echo "此帳號已有人使用!";
    } else {
    echo "此帳號可以使用!";
};
?>