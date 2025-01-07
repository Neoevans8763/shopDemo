<?php
    if(empty($_SESSION['MM_Account'])) {
    header("Location:../login/index.php");
    exit;
};
?>