<!-- 複製api/add_image程式碼貼上 -->
<?php
include_once "../base.php";

// $table='image';

$data=[];
if(!empty($_FILES['img']['tmp_name'])){
    $data['img']=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
}

// $data['text']=$_POST['text'];

//預設為顯示
$data['sh']=1;

// $Image->save($data);
$Mvim->save($data);

// to("../backend.php?do=title");
to("../backend.php?do=image");
