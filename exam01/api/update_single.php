<?php
include_once "../base.php";
$table=$_POST['table'];
$db=ucfirst($table);

$row=$$db->find(1);
$row[$table]=$_POST[$table];

$$db->save($row);

to("../backend.php?do=".$table);