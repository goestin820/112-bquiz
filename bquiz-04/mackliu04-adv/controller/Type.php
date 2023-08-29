<?php
include_once "DB.php";
include_once "Goods.php";

class Type extends DB{
    function __construct()
    {
        parent::__construct('types');
    }

    /**
     * $id => 大分類的id
     */

    function hasMid($id){
        return $this->count(['big'=>$id]);
    }
    
    function getMids($id){
        return $this->all(['big'=>$id]);
    }

    /**
     * $id => 中分類的id
     */
    function getBig($id){
        $row=$this->find($id);
        return $this->find($row['big']);
    }

    function type($id){
        if($id!=0){
            $row=$this->find($id);
            $type=($row['big']==0)?'big':'mid';
        }else{
            $type="all";
        }
        return $type;
    }

    function nav($id){
        $type=$this->type($id);
        $nav='';
        switch($type){
            case "all":
                $nav="全部商品";
            break;
            case "big":
                $row=$this->find($id);
                $nav=$row['name'];
            break;
            case "mid":
                $row=$this->find($id);
                $big=$this->find($row['big']);
                $nav=$big['name'] . " > ".$row['name'];
            break;
        }
        return $nav;
    }

    /**
     * $id=>網址傳來的分類id
     */
    function items($id){
        $type=$this->type($id);
        switch($type){
            case "all":
                $rows=(new Goods)->all(['sh'=>1]);
            break;
            case "big":
                $rows=(new Goods)->all(['big'=>$id,'sh'=>1]);
            break;
            case "mid":
                $rows=(new Goods)->all(['mid'=>$id,'sh'=>1]);
            break;
        }
        return $rows;
    }
}