<!-- 自api/update.php複製程式碼過來 -->

<?php
include_once "../base.php";

$table = $_POST['table'];
$db = ucfirst($table);

//取得對應的資料
$row=$$db->find($_POST['id']);

//判斷是否有上傳成功圖片
if(!empty($_FILES['img']['tmp_name'])){
    //將資料中的檔案名稱更新成上傳成功的圖片檔名
    $row['img']=$_FILES['img']['name'];

    //搬移檔案到upload資料夾下
    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
}

//資料存回資料表中
$$db->save($row);

to("../backend.php?do=$table");

// if(isset($_POST['text'])){
//     $rows=$_POST['text'];
// }else if($table=='admin'){
//     $rows=$_POST['acc'];
// }else{
//     $rows=array_column($$db->all(),'img','id');
// }

// // foreach ($_POST['text'] as $id => $text) {

// //     if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {

// //         $$db->del($id);
// //     } else {

// //         $row = $$db->find($id);

// //         switch($table){
// //             case 'title':
// //                 $row['text']=$text;
// //                 $row['sh']=($_POST['sh']==$id)?1:0;
// //             break;
// //             case 'admin':
// //                 $row['acc']=$text;
// //                 $row['pw']=$_POST['pw'][$id];
// //             break;
// //             case 'menu':
// //                 $row['text']=$text;
// //                 $row['href']=$_POST['href'][$id];
// //             break;
// //             default:
// //             if(isset($_POST['text'])){
// //                 $row['text']=$text;
// //             }
// //             $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
// //         }
