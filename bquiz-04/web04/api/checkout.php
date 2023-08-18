<?php include_once "../base.php";

$_POST['no']=date("Ymd").rand(100000,999999);
$_POST['acc']=$_SESSION['user'];
$_POST['orderdate']=date("Y-m-d");
$_POST['cart']=serialize($_SESSION['cart']);

$Order->save($_POST);

// 清空cart的SESSION，清空購物車內的商品，以免使用者重複購物
unset($_SESSION['cart']);