<?php
include_once "../base.php";

$table=$_POST['table'];
$db=ucfirst($table);

//取得對應的資料
$row=$$db->find($_POST['id']);

//判斷是否有上傳成功圖片
if(!empty($_FILES['img']['tmp_name'])){

    //將資料中的檔案名稱更新成上傳成功的圖片檔名
    $row['img']=$_FILES['img']['name'];

    //搬移檔案到upload資料夾下
    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
}

//資料存回資料表中
$$db->save($row);

to("../backend.php?do=$table");
