<?php
include_once "DB.php";

class Title extends DB
{
    // public $header = '網站標題管理';
    public $header = '網站標題';
    protected $add_header = '新增標題區圖片';

    public $title;
    public $img;

    public function __construct()
    {
        parent::__construct('title');

        $this->title = $this->find(['sh' => 1])['text'];
        $this->img = $this->find(['sh' => 1])['img'];
    }

    /**
     * 彈出視窗的各功能差異內容
     */
    public function add_form()
    {
        $this->modal("<tr>
                        <td>標題區圖片：</td>
                        <td><input type='file' name='img'></td>
                      </tr>
                      <tr>
                        <td>標題區替代文字：</td>
                        <td><input type='text' name='text'></td>
                      </tr>", "./api/add.php");
    }

    public function update_img($id){
        $this->modal("<tr>
                        <td>標題區圖片：</td>
                        <td><input type='file' name='img'></td>
                        <input type='hidden' name='id' value='$id'>
                      </tr>
                    ","./api/update_img.php");
    }

    public function list()
    {
        // $this->backend("./view/title.php");
        $data=[
            'rows'=>$this->all(),
            'header'=>'網站標題管理',
            'table'=>$this->table,
            'addButton'=>'新增網站標題圖片'
          ];
      
          $this->view("./view/title.php",$data);
    }
}
