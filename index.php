<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="網頁描述">
    <meta name="keywords" content="關鍵字">
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/base.css" rel="stylesheet" type="text/css">
    <title>ShopDemo</title>
</head>
<body>
    <div id="top">
        <div id="topContainer">
            <div id="topLeft">
                <span class="alink"><span class="material-icons">phone</span><a href="tel:+886-3-666-8989">(03)666-8989</a></span>
                <span class="material-icons">email</span><span>xx@xxx.xxx</span>
            </div>
            <div id="topRight">
                <?php if($_SESSION['MM_Username']) { ?>
                    <span class="material-icons">person_outline</span><span class="alink" style="position:relative;top:0.3rem;"><a href="memberUpdate.php">更改會員資料</a></span>
                    <span class="material-icons">person_add</span><span class="alink" style="position:relative;top:0.3rem;"><a href="memberLogout.php">登　出</a></span>
                <?php } else { ?>
                    <span class="material-icons">person_outline</span><span class="alink" style="position:relative;top:0.3rem;"><a href="memberLogin.php">會員登入</a></span>
                    <span class="material-icons">person_add</span><span class="alink" style="position:relative;top:0.3rem;"><a href="memberAdd.php">免費註冊</a></span>
                <?php }; ?>
            </div>
        </div>
    </div>
    <header>
        <h1><a href="index.php">ShopDemo</a></h1>
        <span class="material-icons cart"><a href="#">add_shopping_cart</a></span>
        <nav>
            <ul>
                <li class="alink"><a href="#">商品分類1</a></li>
                <li class="alink"><a href="#">商品分類2</a></li>
                <li class="alink"><a href="#">商品分類3</a></li>
            </ul>
        </nav>
    </header>
    <div id="banner">
        <div id="slider">
            <img src="images/banner.jpg" width="100%" alt="替代文字">
            <img src="images/banner.jpg" width="100%" alt="替代文字">
            <img src="images/banner.jpg" width="100%" alt="替代文字">
            <img src="images/banner.jpg" width="100%" alt="替代文字">
            <img src="images/banner.jpg" width="100%" alt="替代文字">
        </div>
        <button id="pre">＜</button>
        <button id="next">＞</button>
    </div>
    <div id="middleContainer">
        <aside>
            <ul>
                <div class="hotSale">熱賣商品</div>
                <li>
                    <img src="images/asidePhoto01.png" width="100%" alt="替代文字">
                    <p class="alink gname"><a href="#">商品名稱</a></p>
                    <p class="alink"><a href="#">667</a></p>
                </li>
                <li>
                    <img src="images/asidePhoto02.png" width="100%" alt="替代文字">
                    <p class="alink gname"><a href="#">商品名稱</a></p>
                    <p class="alink"><a href="#">667</a></p>
                </li>
                <li>
                    <img src="images/asidePhoto03.png" width="100%" alt="替代文字">
                    <p class="alink gname"><a href="#">商品名稱</a></p>
                    <p class="alink"><a href="#">667</a></p>
                </li>
            </ul>
        </aside>
        <main>
            <div class="subject_01">
                <h2>特價商品</h2><div class="triangle_01"></div><div class="line_01"></div>
            </div>
            <div class="goods">
                <img src="images/onSale01.png" width="100%" alt="替代文字">
                <p class="alink"><a href="#">商品名稱</a></p>
                <p class="alink"><a href="#">667</a></p>
            </div>
            <div class="goods">
                <img src="images/onSale02.png" width="100%" alt="替代文字">
                <p class="alink"><a href="#">商品名稱</a></p>
                <p class="alink"><a href="#">667</a></p>
            </div>
            <div class="goods">
                <img src="images/onSale03.png" width="100%" alt="替代文字">
                <p class="alink"><a href="#">商品名稱</a></p>
                <p class="alink"><a href="#">667</a></p>
            </div>
            <div class="goods">
                <img src="images/onSale01.png" width="100%" alt="替代文字">
                <p class="alink"><a href="#">商品名稱</a></p>
                <p class="alink"><a href="#">667</a></p>
            </div>
            <div class="goods">
                <img src="images/onSale02.png" width="100%" alt="替代文字">
                <p class="alink"><a href="#">商品名稱</a></p>
                <p class="alink"><a href="#">667</a></p>
            </div>
            <div class="goods">
                <img src="images/onSale03.png" width="100%" alt="替代文字">
                <p class="alink"><a href="#">商品名稱</a></p>
                <p class="alink"><a href="#">667</a></p>
            </div>
        </main>
    </div>
    <section>
        <div class="subject_01 subject_02">
             <h2>最新商品</h2><div class="triangle_01 triangle_02"></div><div class="line_01 line_02"></div>
        </div>
        <div id="newest">
            <div class="goods">
                <img src="images/newest01.png" width="100%" alt="替代文字">
                <p class="alink"><a href="#">商品名稱</a></p>
                <p class="alink"><a href="#">667</a></p>
            </div>
            <div class="goods">
                <img src="images/newest02.png" width="100%" alt="替代文字">
                <p class="alink"><a href="#">商品名稱</a></p>
                <p class="alink"><a href="#">667</a></p>
            </div>
            <div class="goods">
                <img src="images/newest03.png" width="100%" alt="替代文字">
                <p class="alink"><a href="#">商品名稱</a></p>
                <p class="alink"><a href="#">667</a></p>
            </div>
            <div class="goods">
                <img src="images/newest04.png" width="100%" alt="替代文字">
                <p class="alink"><a href="#">商品名稱</a></p>
                <p class="alink"><a href="#">667</a></p>
            </div>
            <div class="goods">
                <img src="images/newest05.png" width="100%" alt="替代文字">
                <p class="alink"><a href="#">商品名稱</a></p>
                <p class="alink"><a href="#">667</a></p>
            </div>
        </div>
    </section>
</body>
</html>