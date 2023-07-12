<?php
include_once "../base.php";

$table=$_POST['table'];
$db=ucfirst($table);

//更據不同的資料表，對於$rows有不同的指定方式
if(isset($_POST['text'])){

    //title,ad,news,menu
    $rows=$_POST['text'];
}else if($table=='admin'){

    $rows=$_POST['acc'];
}else{

    //mvim,image
    $rows=$_POST['id'];
}

//因為表單為一次送來多筆資料,因此使用迴圈來逐筆處理
foreach($rows as $id => $text){

    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
        
        //刪除資料
        $$db->del($id);
    }else{

        //取出資料
        $row=$$db->find($id);

        //根據不同的資料表對於表單資料會用不同的處理
        switch($table){
            case 'title':
                $row['text']=$text;

                //title只有一筆資料可以為sh=1,其他資料都會是0
                $row['sh']=($_POST['sh']==$id)?1:0;
            break;
            case 'admin':
                $row['acc']=$text;
                $row['pw']=$_POST['pw'][$id];
            break;
            case 'menu':
                $row['text']=$text;
                $row['href']=$_POST['href'][$id];
            break;
            default:
            //ad,news有text這個欄位需要更新
            if(isset($_POST['text'])){
                $row['text']=$text;
            }

            //ad,news,mvim,image都有sh這個欄位需要更新
            $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        }

       //資料存回資料表
       $$db->save($row);
    }

}
to("../backend.php?do=$table");
