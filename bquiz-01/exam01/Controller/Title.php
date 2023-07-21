<?php
include_once "DB.php";

class Title extends DB{

    function __construct()
    {
        parent::__construct('title');
    }


    function backend(){
        $view=['header'=>'網站標題管理',
                'table'=>$this->table,
                'rows'=>$this->all(),
                'addbtn'=>'新增網站標題圖片',
                'modal'=>"./view/modal/title.php",
                'updateModal'=>"./view/modal/updateTitle.php",
                'updateBtn'=>"更新圖片"
        ];
        return $this->view('./view/backend/title.php',$view);
    }

    function show(){
        return $this->find(['sh'=>1]);
    }
}
