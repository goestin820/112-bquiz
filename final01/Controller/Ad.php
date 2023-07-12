<?php
include_once "DB.php";


class Ad extends DB{

    public $header='動態文字廣告';
    protected $add_header='新增動態文字廣告';
    public function __construct()
    {
        parent::__construct('ad');
    }

    public function add_form(){
        $this->modal("<tr>
        <td><?=$this->add_header;?></td>
        <td><input type='text' name='text'></td>
    </tr>","./api/add.php");
    }

    public function list(){
        $this->view("./view/ad.php");
    }

    /**
     * 前台頁面顯示用的方法
     * 在這裏是顯示全部設定為顯示的跑馬燈文字
     */
    function show(){
        $rows=$this->all(['sh'=>1]);
/*       $str='';
        foreach($rows as $row){
            $str.= "&nbs;&nbs;".$row['text'];
        } */

        $str=join('&nbsp;&nbsp;',array_column($rows,'text'));

        return $str;
    }
}