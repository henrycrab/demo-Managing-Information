<?php
//Require file chua cac ham xu ly database
$path = "../db/dbprocess.php";
require "$path";
$sql = 'select * from category';
$categoryList = executeResult($sql);
$id[]='';
$index=0;
 echo '<table border="1px" class="text-center center" width="50%">';
 echo '<h2 class="mt20 text-center">Danh sách sinh viên</h2>';
 echo '<div class =" center mt20">';
   echo '<tr>';
    echo    '<td width="5%"><b>STT</b></td>';
    echo    '<td ><b>Họ và Tên</b></td>';
    echo    '<td ><b>MSV</b></td>';
    echo    '<td ><b>SĐT</b></td>';
    echo    '<td ><b>Email</b></td>';
    echo    '<td colspan="2"><b>Quản lý</b></td>';
   echo '</tr>';
    foreach ($categoryList as $item){
      echo '<tr>';
    echo  '<td> '.++$index.'</td>';
        $id[$index]=(int)$item['id'];
	  echo    '<td height="30px">'.$item['name'].'</td>';
	  echo    '<td height="30px">'.$item['IDnumber'].'</td>';
	  echo    '<td height="30px">'.$item['phone'].'</td>';
	  echo    '<td height="30px">'.$item['email'].'</td>';
    echo '<td width = 10%> <a href = "index.php?subaction=list-add&id='.$id[$index].'">Sửa</a></td>';
    echo '<td width = 10%> <a href = "index.php?subaction=list-manage&query=delete&id='.$id[$index].'"> Xóa</a> </td>';
    echo  '</tr>';
    }

    echo '</div>';
echo '</table>';


if (isset($_GET['query'])){
    $manage = $_GET['query'];
    if($manage == 'delete' ){
            $sql = 'delete from category where id = ' . $_GET['id'] . '';
    execute($sql);
    }
    if($manage=='fix'){

    }
}
