<?php
include_once "DB.php";

class Order extends DB{
    function __construct()
    {
        parent::__construct('orders');
    }

    function backend(){
        $view=['rows'=>$this->all()];
        return $this->view("./view/backend/order.php",$view);
    }
}