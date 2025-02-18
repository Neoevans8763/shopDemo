<?php session_start(); ?>
<?php require_once("../connect/adminConnect.php"); ?>
<?php require_once ("../login/session_check.php"); ?>
<?php
$sql="SELECT accountId, accountName, jobTitle FROM `account`";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="zh-TW">
<head>
<meta charset="utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="../css/reset.css" rel="stylesheet" type="text/css">
<link href="../admin/css/adminBase.css" rel="stylesheet" type="text/css">
<link href="../admin/css/adminMenu.css" rel="stylesheet" type="text/css">
<title>網站管理系統</title>
</head>
<style>
main {


}
#content {
    display:grid;
    grid-auto-rows:5rem;
}
#content #title {
    display:grid;
    grid-template-columns:1fr 1fr;
    justify-items:center;
    font-size:2.2rem;
    color:#160104;
    font-weight:600;
    letter-spacing:0.2rem;
}
#content #title a {
    color:#0e04e8;
    text-decoration:none;
}
#content #title a:hover {
    color:#f00;
    text-decoration:underline;
}
#content #list {
    width:88%;
    justify-self:end;
    display:grid;
    grid-template-columns:2fr 2fr 1fr 1fr;
    align-items:center;
    justify-items:center;
    background-color:#eff;
    box-shadow:0 0.1rem 0.3rem 0.1rem #ccc;
}
#content #list:nth-child(2n+1) {
    background-color:#fff;
}
#content #list span {
    justify-self:start;
    padding-left:2rem;
}
#content #list a {
    color:#00f;
    text-decoration:none;
}
#content #list a:hover {
    color:#f00;
    text-decoration:underline;
}
</style>
<script>
    function confirmDel() {
        if(confirm("確定刪除？\n將永久刪除 !!")) {
            return true;
        } else {
            return false;
        };
    };
    </script>
<body>
<header>
    <div id="top"></div>
    <h1>網站管理系統</h1>
</header>
<main>
    <?php include("adminMenu.php"); ?>
    <div id="content">
        <div id="title">
            <span>管理員帳號列表</span>
            <a href="accountAdd.php">＋新增</a>                
        </div>
        <?php do { ?>
            <div id="list">
                <span><?php echo $row['accountName']; ?></span>
                <span><?php echo $row['jobTitle']; ?></span>
                <a href="accountUpdate.php?accountId=<?php echo $row['accountId']; ?>">編輯</a>
                <a href="accountDel.php?accountId=<?php echo $row['accountId']; ?>" onclick="return confirmDel()">刪除</a>
            </div>
        <?php } while($row=mysqli_fetch_assoc($result)); ?>
    </div>
</main>
<footer>
    &copy;版權所有
</footer>
</body>
</html>