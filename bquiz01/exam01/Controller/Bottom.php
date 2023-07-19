<?php
include_once "DB.php";

class Bottom extends DB{

    function __construct()
    {
        parent::__construct('bottom');
    }
    function backend(){
        $view=['header'=>'頁尾版權資料管理',
                'table'=>$this->table,
                'bottom'=>$this->find(1)['bottom'],
        ];
        return $this->view('./view/backend/bottom.php',$view);
    }
    function show(){
        return $this->find(1)['bottom'];
    }
}
