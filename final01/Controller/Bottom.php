<?php

include_once "DB.php";

class Bottom extends DB{

    public $header='頁尾版權';

    public function __construct()
    {
        parent::__construct('bottom');
    }
    /**
     * 前台頁面顯示用的方法
     * 在這裏是顯示唯一的頁尾版權文字資料
     */
    function show(){
        return $this->find(1)['bottom'];
        //return $this->all(' limit 1')[0]['bottom'];
    }

    function list(){
        return $this->view('./view/bottom.php');
    }
}