<?php
include_once "DB.php";

class Viewer extends DB{

    function __construct()
    {
        parent::__construct('viewer');
    }

    function todayViewer(){
        $today = date("Y-m-d"); //先取得今天的日期字串
        //利用session來判斷使用者是否已經有拜訪過
        if(!isset($_SESSION['viewer'])){
            //利用count()方法來檢查資料表中是否有今天的資料
            $chk = $this->count(['date'=>$today]);
            if($chk > 0){
                //如果資料表中有今天的資料，先取出今天的資料
                $row = $this->find(['date'=>$today]);
                $row['viewer']++; //將訪客人數+1
                $this->save($row); //將訪客人數資料存回資料表
                $_SESSION['viewer']=1; //建立session來紀錄這位訪客來訪的狀態
                return $row['viewer']; //回傳今日的拜訪人數
            }else{
                //如果資料表中沒有今天的資料，表示這位訪客是第一位來拜訪網站
                //在資料表中新增一筆今天的資料，並將瀏灠人次先記錄為1
                $this->save(['date'=>$today,'viewer'=>1]);
                $_SESSION['viewer']=1; //建立session來紀錄這位訪客來訪的狀態
                return 1; //回傳今天的拜訪人數
            }
        }else{
            //如果已經有紀錄session了，那麼只需要回傳資料表中今天的瀏灠人數即可
            return $this->find(['date'=>$today])['viewer'];
        }
    }
    
    function totalViewer(){
        return $this->sum('viewer'); //計算總瀏覽人次
    }
}