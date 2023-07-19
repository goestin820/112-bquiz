<?php
include_once "../base.php";
$table=$_GET['table'];
$id=$_GET['id'];
$db=ucfirst($table);
$$db->update_img($id);
?>