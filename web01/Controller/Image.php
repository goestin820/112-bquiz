<?php
include_once "DB.php";

class Image extends DB
{
    // public $header = '校園映像資料管理';
    public $header='校園映像';
    protected $add_header = '新增校園映像資料圖片';

    public function __construct()
    {
        parent::__construct('image');
    }

    public function add_form()
    {
        $this->modal("<tr>
                    <td>校園映像資料圖片：</td>
                    <td><input type='file' name='img'></td>
                </tr>","./api/update_img.php");
    }

    public function list(){
        $this->backend("./view/image.php");
    }
}