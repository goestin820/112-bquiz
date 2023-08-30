<?php 
include_once "../base.php";

if(isset($_POST['del'])){
    foreach($_POST['del'] as $id){
        echo $id;  
        // echo結果為有勾選刪除的users資料表id欄位值
        $User->del($id);
    }
}

to("../backend.php?do=user");