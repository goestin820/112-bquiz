<?php
include_once "../base.php";
$table=$_GET['table'];
$db=ucfirst($table);
$$db->add_form();
?>