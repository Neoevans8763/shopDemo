<?php session_start(); ?>
<?php require_once("../connect/adminConnect.php"); ?>
<?php require_once ("../login/session_check.php"); ?>
<?php
$sql = "SELECT * FROM `account` WHERE accountId = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "s", $_GET['accountId']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
?>
<?php
if(isset($_POST['MM_Update'])) {
    if($_POST['newPassword']!=$_POST['rePassword']) {
        $msg="新的密碼與確認密碼不符 !!!";
    } else {
        if(empty($_POST['newPassword'])) {
            $password=$row['accountPassword'];
        } else {
            $password=password_hash($_POST['newPassword'], PASSWORD_ARGON2ID);
        };
        $sql_Update = "UPDATE `account` SET accountPassword = ?, jobTitle = ? WHERE accountId = ?";
        if ($stmt = mysqli_prepare($link, $sql_Update)) {
            mysqli_stmt_bind_param($stmt, "ssi", $password, $_POST['jobTitle'], $_GET['accountId']);
            mysqli_stmt_execute($stmt);
        };
        header("Location: account.php");
    };
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
<title>修改管理員密碼</title>
</head>
<style>
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
</style>
<body>
<header>
    <div id="top"></div>
    <h1>網站管理系統</h1>
</header>
<main>
    <?php include("adminMenu.php"); ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']."?accountId=".$row['accountId']; ?>" autocomplete="off">
        <h2>修改管理員密碼</h2>
        <label id="accountName">管理員帳號：<span style="color: #0baa23;font-weight:600;"><?php echo $row['accountName']; ?></span></label>
        <label>新的密碼： <input type="password" name="newPassword" maxlength="20" required></label>
        <label>確認密碼： <input type="password" name="rePassword" maxlength="20" required></label>
        <label>職　　稱： <input type="text" name="jobTitle" maxlength="20" value="<?php echo $row['jobTitle'];?>"></label>
        <div id="formButton">
            <label>　　　　　　　　<input type="button" value="回上一頁" onclick="history.back()"></label>
            <label><input type="submit" value="確　定"></label>
        </div>
        <input type="hidden" name="MM_Update">
        <span style="margin:2rem;color:#f00;"><?php echo $msg; ?></span>
    </form>
</main>
<footer>
    &copy;版權所有
</footer>
</body>
</html>