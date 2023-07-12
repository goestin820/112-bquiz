<?php
include_once "DB.php";
class Mvim extends DB{

    public $header='動畫圖片';
    protected $add_header='新增動畫圖片';

    public function __construct()
    {
        parent::__construct('mvim');
    }
    public function add_form(){
        $this->modal("<tr>
                        <td>動畫圖片：</td>
                        <td><input type='file' name='img'></td>
                    </tr>","./api/add.php");
    }

    public function list(){
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
    /**
     * 前台頁面顯示用的方法
     * 在這裏是在script區顯示javascript語法
     * 把要顯示的圖片路徑字串放到陣列中
     */
    function show(){
        $rows=$this->all(['sh'=>1]);
        foreach($rows as $row){
            echo "lin.push('./upload/{$row['img']}');";
        }
    }
}