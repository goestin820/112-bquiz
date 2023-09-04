<?php
include_once "DB.php";

class Log extends DB{
    function __construct()
    {
        parent::__construct('log');
    }
    
    //($news)為有按過讚的news id，從news.php傳送過來
    function showGoods($news){
        $chk=$this->count(['user'=>$_SESSION['user'],'news'=>$news]);
        
        if($chk>0){
            return "收回讚";
        }else{
            return "讚";
        }
    }
}