<?php 

include_once "DB.php";

class Movie extends DB{
    //建立字串陣列
    protected $level=[
                       1=>"普通級",
                       2=>"普通級",
                       3=>"保護級",
                       4=>"限制級",
                     ];

    function __construct()
    {
        parent::__construct('movies');
    }

    function backend(){
        $view=["rows"=>$this->all(" order by `rank`")];

        return $this->view("./view/backend/movie.php",$view);
    }

    function movies(){
        $today=date("Y-m-d"); //取得今天的日期
        $ondate=date("Y-m-d",strtotime("-2 days")); //計算兩天前的日期
        //取得兩天前到今天為止，設為顯示的院線片，並以4筆為一頁的方式回傳
        $rows=$this->paginate(4, " where `sh`=1 && `ondate` between '$ondate' and '$today' order by `rank`");

        return $rows;
    }

    function level($level){
        //根據代入的分級代號來回傳對應的分級字串
        return $this->level[$level];
    }
}