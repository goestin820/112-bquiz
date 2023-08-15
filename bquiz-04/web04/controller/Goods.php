<?php
include_once "DB.php";

class Goods extends DB{
    function __construct()
    {
        parent::__construct('goods');
    }
}