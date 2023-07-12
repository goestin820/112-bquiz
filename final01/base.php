<?php
session_start();
$BASEDIR=$_SERVER['DOCUMENT_ROOT'];

include_once $BASEDIR."/Controller/Ad.php";
include_once $BASEDIR."/Controller/Admin.php";
include_once $BASEDIR."/Controller/Bottom.php";
include_once $BASEDIR."/Controller/Image.php";
include_once $BASEDIR."/Controller/Menu.php";
include_once $BASEDIR."/Controller/Mvim.php";
include_once $BASEDIR."/Controller/News.php";
include_once $BASEDIR."/Controller/Title.php";
include_once $BASEDIR."/Controller/Total.php";

/**
 * 用來在頁面上顯示格式化的陣列內容
 */
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

/**
 * 簡化header()指令的使用
 */
function to($url){
 header("location:".$url);
}

/**
 * 獨立的sql指令執行，用來處理少數較為複雜的語句，比如聯表查詢或是子查詢的語法
 */
function q($sql){
    $pdo=new PDO("mysql:host=localhost;charset=utf8;dbname=db77",'root','');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}


//在base.php中先宣告一個資料表的變數出來
//因為base.php會被include到主要的index.php及backend.php中
//所以可以確保每個頁面都能使用到這些變數
//使用首字大寫是為了方便識別這個變數是物件
$Total=new Total;
$Bottom=new Bottom;
$Title=new Title;
$Ad=new Ad;
$Image=new Image;
$Mvim=new Mvim;
$News=new News;
$Admin=new Admin;
$Menu=new Menu;


$Total->online();