<?php include_once "../base.php";

// $table=ucfirst($_POST['table']);

// $$_POST['table']，只能被PHP解析為一個變數，須改為${$_POST['table']}才能使用
// $table=${$_POST['table']};
$table=$_POST['table'];
$row0=$$table->find($_POST['id'][0]);
$row1=$$table->find($_POST['id'][1]);

$tmp=$row0['rank'];
$row0['rank']=$row1['rank'];
$row1['rank']=$tmp;

$$table->save($row0);
$$table->save($row1);