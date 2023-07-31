<?php
session_start();

date_default_timezone_set("Asia/Taipei");

include_once __DIR__ . "/controller/Poster.php";

function to($url){
    header("location:".$url);
}

$Poster = new Poster;
