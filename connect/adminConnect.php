<?php
session_start();
// if(empty($_SESSION['MM_Account'])) {
//     header("Location:../login/index.php");
// };
?>
<?php
$host_mysql="localhost";
$username_mysql="kent";
$password_mysql="12345678";
$database_mysql="shopdemo";
$link=mysqli_connect($host_mysql,$username_mysql,$password_mysql,$database_mysql) or die("伺服器忙線中，請稍後再試");
?>
<?php
if(isset($_GET['logout']) && $_GET['logout']=="true") {
    unset($_SESSION['MM_Account']);
    header("Location:../index.php");
};
?>