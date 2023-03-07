<?php
    if(isset($_GET['logout'])=='1'){
        unset($_SESSION['login']);
        header("Location:login.php");
    }
?>
<a href="index.php?logout=1" class ="btn btn-danger logout">Đăng xuất</a>