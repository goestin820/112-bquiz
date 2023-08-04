<?php
include_once "../base.php";

switch($_POST['type']){
    case 'date':
        $Order->del(['date'=>$_POST['target']]);
    break;
    case 'movie':
        $Order->del(['movie'=>$_POST['target']]);
    break;
}

//$Order->del(["{$_POST['type']}"=>$_POST['target']]);