<?php
include_once "DB.php";

class Bottom extends DB{
    function __construct()
    {
        parent::__construct('bottoms');
    }

    function bot(){
        return $this->find(1)['bottom'];
    }
}