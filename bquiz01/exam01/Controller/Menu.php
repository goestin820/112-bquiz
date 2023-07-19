<?php
include_once "DB.php";

class Menu extends DB{

    function __construct()
    {
        parent::__construct('menu');
    }
    
    function backend(){
        $rows=$this->all(['main_id'=>0]);

        foreach($rows as $idx => $row){
            $row['subs']=$this->count(['main_id'=>$row['id']]);
            $rows[$idx]=$row;
        }

        $view=['header'=>'選單管理',
        'table'=>$this->table,
        'rows'=>$rows,
        'addbtn'=>'新增主選單',
        'modal'=>"./view/modal/menu.php",
        'updateModal'=>"./view/modal/submenu.php",
        'updateBtn'=>"編輯次選單"
        ];
     return $this->view('./view/backend/menu.php',$view);
    }

    function show(){
        $rows=$this->all(['main_id'=>0]);
        foreach($rows as $idx =>$row){
            $row['subs']=$this->all(['main_id'=>$row['id']]);
            $rows[$idx]=$row;

        }
        return $rows;
    }
}
