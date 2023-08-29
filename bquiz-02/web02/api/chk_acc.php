<?php
include_once "../base.php";

// 記得加echo，才能將值呼叫回傳function login()
echo $User->chk_acc($_POST);
 
 ?>