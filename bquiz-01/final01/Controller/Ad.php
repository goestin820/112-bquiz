<?php
include_once "DB.php";

class Ad extends DB{

    function __construct()
    {
        parent::__construct('ad');
    }

    function backend(){
        $view=['header'=>'動態文字廣告管理',
        'table'=>$this->table,
        'rows'=>$this->all(),
        'addbtn'=>'新增動態文字廣告',
        'modal'=>"./view/modal/ad.php",
        ];
     return $this->view('./view/backend/ad.php',$view);
    }

   function show(){
        $rows=$this->all(['sh'=>1]);
        return join("&nbsp;&nbsp;",array_column($rows,'text'));

   }

}
