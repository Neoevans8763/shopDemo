<?php require_once("../connect/adminConnect.php"); ?>
<?php
$sql="DELETE FROM `account` WHERE accountId='".$_GET['accountId']."'";
$result=mysqli_query($link,$sql);
header("Location:account.php");
?>