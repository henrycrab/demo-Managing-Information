<div class="clear"></div>
<div class="main">
<?php
if (isset($_GET['action'])){
    $page = $_GET['action'];
}
else {
    $page = '';
}

if (isset($_GET['subaction'])){
    $subpage = $_GET['subaction'];
}
else {
    $subpage='';
}
if($page=='list-manage'){
    echo '<ul class="sublist text-center">';
    echo   '<li><a href="index.php?subaction=list-add">Thêm sinh viên</a></li>';
    echo   '<li><a href="index.php?subaction=list-manage">Liệt kê danh sách</a></li>';
    echo '</ul>';
}
if($subpage=='list-add'){
    require("list-manage/add_fix.php");
}
if($subpage=='list-manage'){
    require("list-manage/list.php");
}
else if ($page=='' && $subpage==''){
    include("guide.php");
}