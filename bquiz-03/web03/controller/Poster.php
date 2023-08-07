<?php

include_once "DB.php";

class Poster extends DB{
    function __construct()
    {
        parent::__construct('posters');
    }

    function backend(){
        $view=[
            "rows"=>$this->all("order by `rank`"),
        ];

        $this->view("./view/backend/poster.php",$view);
    }
    
    function posters(){
        $rows=$this->all(['sh'=>1]," order by `rank`");

        return $rows;
    }
}