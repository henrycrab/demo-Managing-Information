<?php
require ("../db/dbprocess.php");
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
$username='';
$password='';
$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = 'select * from admin where username = "' . $username . '" AND password = "' . $password . '"';
    $row = mysqli_query($con, $sql);
    $count = mysqli_num_rows($row);
//    echo $count;
    if ($count > 0) {
        $_SESSION['login'] = $username;
        header("Location:index.php");

    } else {
        header("Location:login.php");
    }


}
mysqli_close($con);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/login.css">
    <title>Document</title>
    <style>
        html,body{
            background:rgb(225, 225, 208);
        }
    </style>
</head>
<body>
<div class="login-wrapper">
<form action="login.php" method="post" class="form-group  text-center" autocomplete="off">
    <table class="login">
        <tr>
            <td class ="center" height="50px" colspan="2"><h3>Đăng nhập</h3></td>
        </tr>
        <tr>
            <td>Tài khoản:</td>
            <td><input type="text" id="username" name="username"></td>
        </tr>
        <tr >
            <td>Mật khẩu:</td>
            <td><input type="password" id="password" name="password"></td>
        </tr>
        <tr>
            <td class ="center" height="50px" colspan="2"><input type="submit" name ='login' value="Đăng nhập"></td>
        </tr>
    </table>
</form>
</div>
</body>
</html>
