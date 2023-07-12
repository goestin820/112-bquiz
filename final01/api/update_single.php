<?php
include_once "../base.php";

$table=$_POST['table'];
$db=ucfirst($table);

//取得資料表中id為1的資料
$row=$$db->find(1);

//根據資料表名稱來更新資料表,僅對total和bottom兩張資料表有用
$row[$table]=$_POST[$table];

//更新完的資料寫回資料表
$$db->save($row);

to("../backend.php?do=$table");
