<?php
include_once "../base.php";

dd($_POST);

// 刪除pw2欄位
unset($_POST['pw2']);

$User->save($_POST);