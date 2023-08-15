<?php
include_once "../base.php";

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}

if(!isset($_POST['id'])){
    $_POST['no']=rand(100000,999999); //亂數隨機產生一組100000~999999的編號
    $_POST['sh']=1;  //設定預設值為上架狀態
} 

$Goods->save($_POST);

to("../backend.php?do=th");