<!doctype html>
<html lang="zh-TW">
<head>
<meta charset="utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="../css/reset.css" rel="stylesheet" type="text/css">
<link href="../admin/css/adminBase.css" rel="stylesheet" type="text/css">
<link href="../admin/css/adminMenu.css" rel="stylesheet" type="text/css">
<title>新增管理員帳號</title>
</head>
<style>
main {
    width: 84%;
    margin: 4rem auto;
    display: grid;
    grid-template-columns: 1fr 2.5fr;
    font-size: 2rem;
}
#menu {
    margin: auto;
}
form {
    display: grid;
    grid-template-columns: 1.7fr 1fr;
    grid-template-rows: 5rem repeat(4,4rem);
    /* justify-items: center; */
}
h2, label {
    grid-column: span 2;
}
</style>
<body>
<header>
    <div id="top"></div>
    <h1>網站管理系統</h1>
</header>
<main>
    <div id="menu">
        <div id="catalog">功能項目</div>
        <div id="item">
            <a href="account.php">管理員列表</a>
            <a href="#">會員管理</a>
            <a href="#">商品分類管理</a>
            <a href="#">商品管理</a>
            <a href="#">訂單管理</a>
            <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?logout=true"); ?>">登出</a>
        </div>
    </div>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="off">
        <h2>＋新增管理員帳號</h2>
        <label>管理員帳號: <input type="text" name="accountName" maxlength="20" autofocus required></label>
        <label>管理員密碼: <input type="password" name="accountPassword" maxlength="20" required></label>
        <label>職　　　稱: <input type="text" name="jobTitle" maxlength="20"></label>
        <input type="button" value="回上一頁" onclick="history.back()">
        <input type="submit" value="新　增">
        <input type="hidden" name="MM_Insert">
    </form>
</main>
<footer>
    &copy;版權所有
</footer>
</body>
</html>