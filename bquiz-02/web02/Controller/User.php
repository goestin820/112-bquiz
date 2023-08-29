
<?php
include_once "DB.php";

class User extends DB{
    function __construct()
    {
        parent::__construct('users');
    }

    function chk_acc($a12345){
        $chk=$this->count(['acc'=>$_POST['acc']]);
        if($chk>0){
            $chk=$this->chk_pw($_POST);
            if($chk>0){
                //帳密都正確時，在session中紀錄使用者帳號
                $_SESSION['user']=$_POST['acc'];
                return 1;  //帳號正確
            }else{
                return 2;  //密碼錯誤
            }
        }else{
            return 0; //查無帳號
            
        }
    }

    function chk_pw($a55688){
        return $this->count($a55688);
    }

    function backend(){
        $data=[
            'rows'=>$this->all(),
        ];

        $this->view("./view/backend/user.php",$data);
    }
}