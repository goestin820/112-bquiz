<?php
include_once "../base.php";

$type=$_POST['type'];
unset($_POST['type']); //因為Log資料表沒有type欄位，所以要先行移除type
$_POST['user']=$_SESSION['user'];  //將前端暫存的session['user']值，指派給Log資料表的user欄位

$news=$News->find($_POST['news']); //透過news.php傳過來的news(也就是data-id值)，搜尋到News資料表的該筆資料

switch($type){
    case 1:
        $Log->save($_POST);
        $news['goods']++;
    break;
    case 2:
        $Log->del($_POST);
        $news['goods']--;
    break;
}

$News->save($news);