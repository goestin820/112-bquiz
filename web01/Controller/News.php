<?php
include_once "DB.php";

class News extends DB
{
    public $header = '最新消息資料管理';
    protected $add_header = '新增最新消息資料';

    public function __construct()
    {
        parent::__construct('news');
    }

    public function add_form()
    {
        $this->modal("<tr>
        <td>最新消息資料：</td>
        <td>
            <textarea name='text' style='width:400px;height:200px'></textarea>
        </td>
    </tr>","./api/add.php");
    }

    public function list(){
        $this->backend("./view/news.php");
    }  
}