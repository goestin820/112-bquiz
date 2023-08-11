<?php
session_start();

date_default_timezone_set("Asia/Taipei");

include_once __DIR__ . "/controller/Poster.php";
include_once __DIR__ . "/controller/Movie.php";
include_once __DIR__ . "/controller/Order.php";

function to($url){
    header("location:".$url);
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

$Poster = new Poster;
$Movie = new Movie;
$Order = new Order;