<?php

// echo('HELLO');
header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: *');
// header('Access-Control-Allow-Headers: *');

$url="https://odws.hccg.gov.tw/001/Upload/25/opendataback/9059/165/9084dda0-a6c1-496b-b175-f7c2f22b66f1.json";

$data=[
    'message'=>'test_ok',
    // 'name'=>'tin',
    // 'tel'=>'0911-123-456',
    'url' => $url
    ];

echo json_encode($data);