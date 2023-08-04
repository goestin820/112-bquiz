<?php 

include_once "DB.php";

class Movie extends DB{

    function __construct()
    {
        parent::__construct('movies');
    }

    function backend(){
        $view=["rows"=>$this->all(" order by `rank`")];

        return $this->view("./view/backend/movie.php",$view);
    }
}