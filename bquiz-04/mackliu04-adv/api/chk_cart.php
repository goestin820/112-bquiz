<?php
include_once "../base.php";

if(isset($_SESSION['cart'])){

    echo  json_encode(['count'=>count($_SESSION['cart']),
                        'total'=>$Goods->total($_SESSION['cart'])]);
    
}else{
    echo  json_encode(['count'=>0]);
}

?>