<?php
include_once "DB.php";

class Image extends DB{

    function __construct()
    {
        parent::__construct('image');
    }

    function backend(){
        $view=['header'=>'校園映像資料管理',
        'table'=>$this->table,
        'rows'=>$this->paginate(3),
        'links'=>$this->links(),
        'addbtn'=>'新增校園映像圖片',
        'modal'=>"./view/modal/image.php",
        'updateModal'=>"./view/modal/updateImage.php",
        'updateBtn'=>"更換圖片"
        ];
     return $this->view('./view/backend/image.php',$view);
    }

    function num(){
        return $this->count(['sh'=>1]);
    }

    
    function show(){
        $rows=$this->all(['sh'=>1]);
        foreach($rows as $idx => $row){
        ?>
        <div class="im" id="ssaa<?=$idx;?>">
            <img src="./upload/<?=$row['img'];?>" style="width:150px;height:103px;border:3px solid orange;margin:2px">
        </div>

        <?php
        }
    }


}
