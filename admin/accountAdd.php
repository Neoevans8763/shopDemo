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
if(isset($_POST['MM_Insert'])) {
    $sql = "INSERT INTO `account` (accountName, accountPassword, jobTitle) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($link, $sql);
    $hashedPassword = password_hash($_POST['accountPassword'], PASSWORD_ARGON2ID);
    mysqli_stmt_bind_param($stmt, "sss", $_POST['accountName'], $hashedPassword, $_POST['jobTitle']);
    mysqli_stmt_execute($stmt);
    header("Location: account.php");
    exit;
}
?>
<?php
if(isset($_GET['logout']) && $_GET['logout']=="true") {
    unset($_SESSION['MM_Account']);
    header("Location:../index.php");
};
?>
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
    grid-template-columns: 1fr 2.5fr 1fr;
    font-size: 2rem;
}
#menu {
    justify-self:end;
    width: 22rem;
}
form {
    display: grid;
    grid-template-rows: 5rem repeat(6,4rem);
    justify-items: center;
}
h2 {
    font-size: 2.2rem;
    font-weight: 600;
    letter-spacing: 0.3rem;
}
input {
    font-size: 1.8rem;
} 
input[type="button"] {
    padding: 0.1rem 0.4rem;
    font-size: 2rem;
    margin-right: 0.5rem;
}
input[type="submit"] {
    padding: 0.1rem 0.4rem;
    font-size: 2rem;
}
#errorMessage {
    color: #e00;
    margin-top: 1.4rem;
    display: none;
}
#accountMessage{
    color: #e00;
    margin-top: 1.4rem;
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
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="off" onsubmit=" return checkPassword()">
        <h2>＋新增管理員帳號</h2>
        <label>管理帳號： <input id="accountName" type="text" name="accountName" maxlength="20" autofocus required onblur="accountCheck()"></label>
        <label>登入密碼： <input type="password" name="accountPassword" maxlength="20" required></label>
        <label>確認密碼： <input type="password" name="accountRepassword" maxlength="20" required></label>
        <label>職　　稱： <input type="text" name="jobTitle" maxlength="20"></label>
        <div id="formButton">
            <label>　　　　　　　　<input type="button" value="回上一頁" onclick="history.back()"></label>
            <label><input id="submitButton" type="submit" value="新　增"></label>
        </div>
        <label id="errorMessage">確認密碼不符!</label>
        <label id="accountMessage"></label>
        <input type="hidden" name="MM_Insert">
    </form>
</main>
<footer>
    &copy;版權所有
</footer>
<script>
function checkPassword() {
    var password = document.querySelector("input[name='accountPassword']").value;
    var repassword = document.querySelector("input[name='accountRepassword']").value;
    var errorMessage = document.getElementById("errorMessage");
    if (password !== repassword) {
        errorMessage.style.display = "block";
        return false;
    } else {
        alert("新增成功");
        return true;
    };
};
var return_account="";
function accountCheck() {
    var accountName = document.getElementById("accountName").value;
    var submitButton = document.getElementById("submitButton");
    if(accountName!="") {
        var request = new XMLHttpRequest();
        var url = "accountCheck.php";
        var vars = "accountName=" + encodeURIComponent(accountName);
        request.open("POST", url, true);
        request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        request.onreadystatechange = function() {
            if(request.readyState == 4 && request.status == 200) {
                    return_account = request.responseText;
                    document.getElementById("accountMessage").innerHTML = return_account;
                    if(return_account.includes("此帳號已有人使用!")) {
                        submitButton.disabled = true;
                    } else {
                        submitButton.disabled = false;
                    }
            }
        };
        request.send(vars);
    } else {
        submitButton.disabled = false;
    }
};
</script>
</body>
</html>