<?php require_once("../connect/adminConnect.php"); ?>
<?php

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

</style>
<body>
<header>
    <div id="top"></div>
    <h1>網站管理系統</h1>
</header>
<main>
    <?php include("adminMenu.php"); ?>
    <div id="content">
        <span>管理者帳號列表</span>
        <a href="accountAdd.php">＋新增管理者帳號</a>
    </div>
    <div id="list">

    </div>
</main>
<footer>
    &copy;版權所有
</footer>
</body>
</html>