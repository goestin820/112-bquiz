<?php include_once "../base.php";


// $db=${$_POST['table']};
// $db->del($_POST['id']);
// 上列2行程式碼，可簡化為下列1行程式碼
${$_POST['table']}->del($_POST['id']);