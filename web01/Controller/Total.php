<?php 
include_once "DB.php";

class Total extends DB
{
    public $header = '進站人數';

    public function __construct()
    {
        parent::__construct('total');
    }
}