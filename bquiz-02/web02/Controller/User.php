<?php
include_once "DB.php";

class User extends DB{
    function __construct()
    {
        parent::__construct('users');
    }

    function chk_acc(){
        $chk=$this->count(['acc'=>$_POST['acc']]);
        if($chk>0){
            //帳號正確時，呼叫chk_pw()方法，驗證帳號密碼是否都正確
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

    // 驗證帳號密碼的方法
    function chk_pw(){
        return $this->count($_POST);
    }

    function backend(){
        $data=[
            'rows'=>$this->all(),
        ];
        dd($data);

    //extract()會把陣列中的key值直接變成變數名稱，value值則變成變數值
        $this->view("./view/backend/user.php",$data);
    }
}