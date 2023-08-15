<!-- 從api/User.php複製程式碼過來修改 -->
<?php

include_once "DB.php";
class Admin extends DB{
    function __construct()
    {
        parent::__construct('admins');
    }

    function login($user){
        if($this->count($user)){
            $_SESSION['admin']=$user['acc'];
            return 1;
        }else{
            return 0;
        }
    }

    function backend(){
        $view['rows']=$this->all();
        return $this->view("./view/backend/admin.php",$view);
    }
}