<!-- 撰寫驗證表單帳號密碼的方法 -->
<?php
include_once "DB.php";

class User extends DB{
    function __construct()
    {
        parent::__construct('users');
    }

    function chk_acc($user){
        $chk=$this->count(['acc'=>$user['acc']]);
        if($chk>0){
            $chk=$this->chk_pw($user);
            if($chk>0){
                //帳密都正確時，在session中紀錄使用者帳號
                $_SESSION['user']=$user['acc'];
                return 1;  //帳號正確
            }else{
                return 2;  //密碼錯誤
            }
        }else{
            return 0; //查無帳號
            
        }
    }

    function chk_pw($user){
        return $this->count($user);
    }

    function backend(){
        $data=[
            'rows'=>$this->all(),
        ];

        $this->view("./view/backend/user.php",$data);
    }
}