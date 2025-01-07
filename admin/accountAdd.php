<?php session_start(); ?>
<?php require_once("../connect/adminConnect.php"); ?>
<?php require_once ("../login/session_check.php"); ?>
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
    <?php include("adminMenu.php"); ?>
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
                    if(return_account.includes("此帳號已有人使用!") || return_account.includes("帳號數量已達到上限，無法新增更多帳號!")) {
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