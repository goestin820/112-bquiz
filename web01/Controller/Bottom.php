<?php
include_once "DB.php";

class Bottom extends DB
{
    public $header = '頁尾版權';

    public function __construct()
    {
        parent::__construct('bottom');
    }
}