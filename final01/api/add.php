<?php
include_once "../base.php";

//取得表單資料傳來的資料表名稱
$table=$_POST['table'];

//轉換首字母為大寫
$db=ucfirst($table);

//建立一個空的資料陣列
$data=[];

//判斷是否有檔案上傳成功的狀況
if(!empty($_FILES['img']['tmp_name'])){

    //如果檔案上傳成功則把檔案名稱寫入到資料陣列中
    $data['img']=$_FILES['img']['name'];

    //將檔案搬移到專案目錄下的upload資料夾下，並將上傳的暫存檔案命名為檔案的名稱
    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
}

//根據不同的資料表對其他的表單資料進行不同的動作
switch($table){
    //title,news,ad三張資料都是一樣的動作
    case "title":
    case 'news':
    case 'ad':
        //把表單中的文字欄位資料寫入到資料陣列中
        $data['text']=$_POST['text'];
    break;
    case "admin":
        //管理者管理的表單欄位為acc和pw     
        $data['acc']=$_POST['acc'];
        $data['pw']=$_POST['pw'];
    break;
    case 'menu':
        //選單的表單欄位為text和href
        $data['text']=$_POST['text'];
        $data['href']=$_POST['href'];
    break;
}

//除了admin外,其他的資料表都有sh這個欄位，因此在這邊先判斷是不是admin資料表
if($table!='admin'){

    //除了title外，其他的資料表都是預設sh為1
    $data['sh']=($table=='title')?0:1;
}

//利用可變變數將$data陣列寫入到資料表中
$$db->save($data);

//返回到各表單原本的功能去
to("../backend.php?do=$table");