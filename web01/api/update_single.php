<?php
include_once "../base.php";
//文字的更新
//dd($_POST);
$table=$_POST['table'];
$db=ucfirst($table);
//dd($_POST);

$row=$$db->find(1);
$row[$table]=$_POST[$table];

/* switch($table){
    case 'total':
    break;
    case 'bottom':
        $row['bottom']=$_POST['bottom'];
    break;
}
 */
$$db->save($row);

to("../backend.php?do=$table");
