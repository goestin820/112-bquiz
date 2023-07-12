<?php
include_once "DB.php";
class News extends DB{

    public $header='最新消息資料';
    protected $add_header='新增最新消息資料';
    public function __construct()
    {
        parent::__construct('news');
    }

    public function add_form(){
        $this->modal("<tr>
        <td>最新消息資料：</td>
        <td>
            <textarea name='text' style='width:400px;height:200px'></textarea>
        </td>
    </tr>","./api/add.php");
    }

    public function list(){
        $this->view("./view/news.php");
    }

    /**
     * 用來回傳被設定為顯示的資料筆數
     */
    public function num(){
        return $this->count(['sh'=>1]);
    }

    /**
     * 用來判斷是否要顯示more連結的方法
     */
    function more(){
        if($this->num() > 5){
            echo "<a href='?do=news' style='float:right'>More...</a>";
        }
    }

    /**
     * 前台頁面顯示用的方法
     * 在這裏是顯示最多5筆最新消息資料
     */
    function show(){
        $rows=$this->all(['sh'=>1],' limit 5');
        echo "<ol class='ssaa' >";
        foreach($rows as $row){
            echo "<li>";
            echo mb_substr($row['text'],0,20);
            echo "<span class='all' style='display:none'>";
            echo $row['text'];
            echo "</span>";
            echo "</li>";
        }
        echo "</ol>";
    }

    /**
     * 前台頁面顯示更多消息的方法
     * 在這裏會同時使用分頁的功能，讓更多消息有分頁的功能在
     */
    function moreNews(){
        $rows=$this->paginate(5,['sh'=>1]);
        $start=$this->links['start']+1;
        echo "<ol class='ssaa' start='$start'>";
        foreach($rows as $row){
            echo "<li class='sswww'>";
            echo mb_substr($row['text'],0,20);
            echo "<span class='all' style='display:none'>";
            echo $row['text'];
            echo "</span>";
            echo "</li>";
        }
        echo "</ol>";
    }
}