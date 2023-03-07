<?php
//Require file chua cac ham xu ly database
$path = "../db/dbprocess.php";
require "$path";

$id='';
$name='';
$IDnumber = '';
$phone = '';
$email = '';
if(!empty($_POST)) {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['IDnumber'])) {
        $IDnumber = $_POST['IDnumber'];
    }
    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }


    if (!empty($name)) {
        if ($id == '') {
            $sql = 'insert into category(name,IDnumber,phone,email) values ("'.$name.'","'.$IDnumber.'","'.$phone.'","'.$email.'")';
            execute($sql);
            header('Location:index.php?subaction=list-add');
        } else {
            $sql = 'update category set name = "'.$name.'",IDnumber = "'.$IDnumber.'",phone ="'.$phone.'",email ="'.$email.'" where id = '.$id;
            execute($sql);
            header('Location:index.php?subaction=list-manage');
        }

    }
}


if (isset($_GET['id'])) {
    $id     = $_GET['id'];
    $sql      = 'select * from category where id = '.$id;
    $category = executeSingleResult($sql);
    if ($category != null) {
        $name = $category['name'];
        $IDnumber = $category['IDnumber'];
        $phone = $category['phone'];
        $email = $category['email'];
    }
}



    if(isset($_GET['id'])){
        echo '<h2 class="text-center mt20">Sửa thông tin sinh viên</h2>';
    }
    else {
        echo '<h2 class="text-center mt20">Thêm thông tin sinh viên</h2>';
    }

?>
<!-- Form nhap du lieu-->
    <div class="form-center " >
<form method="POST" >
    <input type="text" name="id" value="<?=$id?>" hidden="true">
    <table>
        <tr>
            <p class="mt8 mb0">Họ và Tên:</p>
            <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$name?>">
            <p class="mt8 mb0">Mã Sinh Viên:</p>
            <input required="true" type="text" class="form-control" id="IDnumber" name="IDnumber" value="<?=$IDnumber?>">
            <p class="mt8 mb0">SĐT:</p>
            <input required="true" type="text" class="form-control" id="phone" name="phone" value="<?=$phone?>">
            <p class="mt8 mb0">Email:</p>
            <input required="true" type="text" class="form-control" id="email" name="email" value="<?=$email?>">
        </tr>
    </table>
    <div class="mt20">
    <input  type="submit" name="add-category " value="Lưu" class="btn center">
    </div>
</form>
</div>




