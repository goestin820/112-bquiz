<?php 
include_once "../base.php";

echo ${$_POST['table']}->login($_POST['user']);
