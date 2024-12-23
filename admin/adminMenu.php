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