<?php include_once "../base.php";

if(isset($_POST['del'])){
    foreach($_POST['del'] as $id){
        // echo $id;  結果為users資料表中id欄位的值
        $User->del($id);
    }
}

to("../backend.php?do=user");