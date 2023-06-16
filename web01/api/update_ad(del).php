<?php
include_once "../base.php";
//文字的更新
foreach($_POST['text'] as $id => $text){

    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){

        // $Title->del($id);
        $AD->del($id);

    }else{

        $row=$Title->find($id);
        $row['text']=$text;
        $row['sh']=($_POST['sh']==$id)?1:0;
        $Title->save($row);
    }

}
