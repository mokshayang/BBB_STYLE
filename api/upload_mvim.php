<?php
include "base_test.php";
// echo $_POST['id'];
$row=$Mvim->find($_POST['id']);


if(!empty($_FILES['img']['tmp_name'])){
    //沒做刪除圖片
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $img=$_FILES['img']['name'];
    $row['img']=$_FILES['img']['name'];//更新名字
    $Mvim->save($row);//update
}

to("../back.php?do=Mvim");
?>