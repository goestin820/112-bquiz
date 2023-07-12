<?php 
include_once "../base.php";

//取得表單資料中的主選單id
$main_id=$_POST['main_id'];

//編輯/刪除次選單
if(isset($_POST['text'])){
    foreach($_POST['text'] as  $id => $text){
        /**
         * 先判斷$_POST['del']這個變數是否存在，
         * 如果$_POST['del']存在，則表示有資料要刪除，
         * 接著同時判斷目前迴圈資料的$id是否在$_POST['del']中
         * 如果$id也同時可以在$_POST['del']中找到
         * 那就表示這筆資料是要被刪除的
         */
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){

            //執行刪除資料的方法
            $Menu->del($id);

        }else{
            //如果不是要刪除資料的話，那就表示要進行編輯更新的動作
            //先把資料撈出來
            $row=$Menu->find($id);

            //將文字資料更新
            $row['text']=$text;

            //根據$id來找出對應的$_POST['href']更新
            $row['href']=$_POST['href'][$id];

            //更新進資料表
            $Menu->save($row);
        }
    }
}

//如果$_POST['text2']存在的話，表示有新增的資料
if(isset($_POST['text2'])){
    foreach($_POST['text2'] as $idx => $text){

        //先判斷$text不是空白的內容，如果是空白的內容則不做新增
        if($text!=""){
            //根據$_POST的內容將對應的text及href新增進資料表
            //其中要注意main_id的寫入，因為新增的次選單一定會有所屬的主選單
            $Menu->save([
                'text'=>$text,
                'href'=>$_POST['href2'][$idx],
                'sh'=>1,
                'main_id'=>$main_id
            ]
            );
        }
    }
}

to("../backend.php?do=menu");




?>



