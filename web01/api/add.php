<?php
include_once "../base.php";
$table=$_POST['table'];
$db=ucfirst($table);
$data=[];

if(!empty($_FILES['img']['tmp_name'])){
    $data['img']=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
}

switch($table){
    case "title":
    case 'news':
    case 'ad':
        $data['text']=$_POST['text'];
    break;
    case "admin":
        $data['acc']=$_POST['acc'];
        $data['pw']=$_POST['pw'];
    break;
    case 'menu':
        $data['text']=$_POST['text'];
        $data['href']=$_POST['href'];
    break;
}

/* if($table==$title){
    $data['sh']=0;
}else{
    $data['sh']=1;
} */

//假如資料表不是admin的話，就將sh欄位顯示出來
if($table!='admin'){
    $data['sh']=($table=='title')?0:1;
}

$$db->save($data);

to("../backend.php?do=$table");