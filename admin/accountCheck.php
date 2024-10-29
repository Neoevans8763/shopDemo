<?php
session_start();
$host_mysql="localhost";
$username_mysql="kent";
$password_mysql="12345678";
$database_mysql="shopdemo";
$link=mysqli_connect($host_mysql,$username_mysql,$password_mysql,$database_mysql) or die("伺服器忙線中，請稍後再試");
$sql_check="SELECT accountName FROM `account` WHERE accountName='".$_POST['accountName']."'";
$result_check=mysqli_query($link,$sql_check);
if(mysqli_num_rows($result_check)) {
    echo "此帳號已有人使用!";
    } else {
    echo "此帳號可以使用!";
};


?>