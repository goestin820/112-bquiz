<?php
include_once "DB.php";

class Total extends DB{

    function __construct()
    {
        parent::__construct('total');
    }

    function backend(){
        $view=['header'=>'進站總人數管理',
                'table'=>$this->table,
                'total'=>$this->find(1)['total'],
        ];
        return $this->view('./view/backend/total.php',$view);
    }

    function show(){
        return $this->find(1)['total'];
    }

    function online(){
        if(!isset($_SESSION['online'])){
            $total=$this->find(1);
            $total['total']++;
            $this->save($total);
            $_SESSION['online']=1;
        }
    }

}
