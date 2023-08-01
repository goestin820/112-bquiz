<?php
// 複製整段Controller/Users.php程式碼過來修改
include_once "DB.php";

class News extends DB{
    function __construct()
    {
        parent::__construct('news');
    }

    // function chk_acc($user){
    //     $chk=$this->count(['acc'=>$user['acc']]);
    //     if($chk>0){
    //         $chk=$this->chk_pw($user);
    //         if($chk>0){
    //             $_SESSION['user']=$user['acc'];
    //             return 1;
    //         }else{
    //             return 2;
    //         }
    //     }else{
    //         return 0;
    //     }
    // }

    // function chk_pw($user){
    //     return $this->count($user);
    // }
    
    function type($type){
        $array=[
                 1=>"健康新知",
                 2=>"菸害防治",
                 3=>"癌症防治",
                 4=>"慢性病防治"
               ];
        return $array[$type];
    }

    function backend(){
        $data=[
                'rows'=>$this->paginate(3), 
                'links' =>$this->links(),
                'start'=>($this->links['now']-1)*$this->links['num']+1
              ];

        $this->view("./view/backend/news.php",$data);
    }
}