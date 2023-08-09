<?php
include_once "DB.php";

class User extends DB{
    function __construct()
    {
        parent::__construct('users');
    }

    function chk_acc($user123){
        $chk=$this->count(['acc'=>$user123['acc']]);
        if($chk>0){
            $chk=$this->chk_pw($user123);
            if($chk>0){
                $_SESSION['user']=$user123['acc'];
                return 1;
            }else{
                return 2;
            }
        }else{
            return 0;
        }
    }

    function chk_pw($user456){
        return $this->count($user456);
    }

    function backend(){
        $data=[
            'rows'=>$this->all(),
        ];

        $this->view("./view/backend/user.php",$data);
    }
}