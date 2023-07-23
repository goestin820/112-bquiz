<?php
include_once "../base.php";

$table=$_POST['table'];
$db=ucfirst($table);

$data=[];
if(!empty($_FILES['img']['tmp_name'])){
    $data['img']=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
}

switch($table){
    case 'title':
        $data['text']=$_POST['text'];
        $data['sh']=0;
    break;
    case 'admin':
        $data['acc']=$_POST['acc'];
        $data['pw']=$_POST['pw'];
    break;
    case 'menu':
        $data['text']=$_POST['text'];
        $data['href']=$_POST['href'];
        $data['sh']=1;
    break;
    default:
    if(isset($_POST['text'])){
        $data['text']=$_POST['text'];
    }
    $data['sh']=1;
}

$$db->save($data);

to("../backend.php?do=".$table);
