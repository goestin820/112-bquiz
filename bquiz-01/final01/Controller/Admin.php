<?php
include_once "DB.php";

class Admin extends DB{
    function __construct()
    {
        parent::__construct('admin');
    }

    function backend(){
        $view=['header'=>'管理者帳號管理',
        'table'=>$this->table,
        'rows'=>$this->all(),
        'addbtn'=>'新增管理者帳號',
        'modal'=>"./view/modal/admin.php",
        ];
     return $this->view('./view/backend/admin.php',$view);
    }

    function login($user){
        if(!empty($user)){
            $chk=$this->count($user);
            if($chk){
                to("backend.php");
            }else{
            ?>
            <script>alert("帳號或密碼輸入錯誤!")</script>
            <?php
            }
        }
    }
}
