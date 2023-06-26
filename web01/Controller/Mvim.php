<?php
include_once "DB.php";

class Mvim extends DB
{
    // public $header = '動畫圖片管理';
    public $header='動畫圖片';
    protected $add_header = '新增動畫圖片';

    public function __construct()
    {
        parent::__construct('mvim');
    }

    public function add_form()
    {
        $this->modal("<tr>
                        <td>動畫圖片：</td>
                        <td><input type='file' name='img'></td>
                    </tr>","./api/add.php");
    }

    public function list(){
        // $this->backend("./view/mvim.php");
        $this->view("./view/mvim.php");
    }

    public function update_img($id){
        $this->modal("<tr>
                        <td>動畫圖片：</td>
                        <td><input type='file' name='img'></td>
                        <input type='hidden' name='id' value='$id'>
                      </tr>
                    ","./api/update_img.php");
    }
}