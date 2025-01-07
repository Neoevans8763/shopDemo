<?php session_start(); ?>
<?php require_once("../connect/adminConnect.php"); ?>
<?php 
if (isset($_POST['MM_Login'])) {
    $accountName = $_POST['accountName'];
    $accountPassword = $_POST['accountPassword'];

    // 使用參數化查詢來防止 SQL 注入
    $sql = "SELECT accountName, accountPassword FROM account WHERE accountName = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $accountName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);    

    // 使用 password_verify 來檢查密碼是否正確
    if ($row && password_verify($accountPassword, $row['accountPassword'])) {
        $_SESSION['MM_Account'] = $row['accountName'];
        header("Location: ../admin/main.php");
    } else {
        header("Location: index.php");
    }
}
?>
<!doctype html>
<html lang="zh-TW">
<head>
<meta charset="utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="../css/reset.css" rel="stylesheet" type="text/css">
<link href="../admin/css/adminBase.css" rel="stylesheet" type="text/css">
<title>網站管理系統</title>
</head>
<style>
main {
    display: block;
    width:20%;
    min-height: 70rem;
    margin: auto;
    font-size: 2rem;
}
form{
    margin-top:3rem; 
    display:grid;
    grid-auto-rows:4rem;
    justify-items:center;
}
input {
    font-size:1.8rem;
}
input[type="submit"] {
    margin-left:68%;
    font-size:1.7rem; 
}
</style>
<body>
<header>
    <div id="top"></div>
    <h1>網站管理系統</h1>
</header>
<main>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="off">
        <label>管理者帳號: <input type="text" name="accountName" maxlength="20" autofocus required></label>
        <label>管理者密碼: <input type="password" name="accountPassword" maxlength="20" required></label>
        <input type="submit" value="登　入">
        <input type="hidden" name="MM_Login">
    </form>
</main>
<footer>
    &copy;版權所有
</footer>
</body>
</html>