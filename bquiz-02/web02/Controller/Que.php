<!-- 複製整段Controller/News.php程式碼過來修改 -->
<?php
include_once "DB.php";

class Que extends DB{
    function __construct()
    {
        parent::__construct('que');
    }



    function backend(){
        $this->view("./view/backend/que.php");
    }
}