<?php
include_once "DB.php";
class Total extends DB{

    public $header='進站人數';

    public function __construct()
    {
        parent::__construct('total');
    }

    /**
     * 前台頁面顯示用的方法
     * 在這裏是顯示目前的網站瀏灠人數
     */
    function show(){
        return $this->find(1)['total'];
        //return $this->all(' limit 1')[0]['bottom'];
    }
    function list(){
        return $this->view("./view/total.php");
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