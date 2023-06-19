<?php
include_once "../base.php";

$data=[];

// 因動態文字不需要放圖片，所以不需判斷執行圖片是否上傳
// if(!empty($_FILES['img']['tmp_name'])){
//     $data['img']=$_FILES['img']['name'];
//     move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
// }

$data['text']=$_POST['text'];

//預設為顯示
$data['sh']=1;

$Ad->save($data);

to("../backend.php?do=ad");