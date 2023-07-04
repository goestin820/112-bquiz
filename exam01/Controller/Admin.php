<?php
include_once "DB.php";

class Admin extends DB{
    function __construct()
    {
        parent::__construct('admin');
    }

    function backend(){
        $view=['header'=>'管理者帳號管理',
        'table'=>$this->table,
        'rows'=>$this->all(),
        'addbtn'=>'新增管理者帳號',
        'modal'=>"./view/modal/admin.php",
        ];
     return $this->view('./view/backend/admin.php',$view);
    }
}
