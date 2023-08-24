<?php
// function dd($data){
//     echo ('<pre>');
//     print_r($data);
//     echo ('</pre>');
// }

// header('Access-Control-Allow-Origin: http://test.com');
// header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

// windows host
// 127.0.0.1 blue-front.com
// 192.168.211.3 red-back.com
// redred 前端
// blue 後端
// cmd ipconfig IPv4 位址 每個人都不一樣

header('Access-Control-Allow-Origin: http://blue-front.com:5501');

// header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept');


$url = "https://odws.hccg.gov.tw/001/Upload/25/opendataback/9059/165/9084dda0-a6c1-496b-b175-f7c2f22b66f1.json";


// 方法一 存在變數 顯示
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
// 預設是false 顯示
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
echo $result;
// dd($result);



// 方法二 直接執行不顯示
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// 預設是false 顯示
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_exec($ch);



// url
// 
// $url = "https://odws.hccg.gov.tw/001/Upload/25/opendataback/9059/165/9084dda0-a6c1-496b-b175-f7c2f22b66f1.json";

// // echo ('HELLO');
// $data = [
//     'message' => 'test_ok',
//     'url' => $url
// ];

// echo json_encode($data);
