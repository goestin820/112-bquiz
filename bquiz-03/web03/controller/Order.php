<?php include_once "DB.php";

class Order extends DB{
    function __construct()
    {
        parent::__construct('orders');
    }

    function backend(){
        $view=['rows'=>$this->all(' order by `no` desc'),
               'movies'=>$this->q("select `movie` from $this->table GROUP BY `movie`")];
        return $this->view("./view/backend/order.php",$view);
    }
}