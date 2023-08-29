<?php
include_once "DB.php";

class Goods extends DB{
    function __construct()
    {
        parent::__construct('goods');
    }
function total($cart){
    $sum=0;
    foreach($cart as $id => $qt){
        $item=$this->find($id);
        $sum+=$item['price']*$qt;
    }
    return $sum;
}
}