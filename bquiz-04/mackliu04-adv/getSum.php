<?php
function dd($data)
{
    echo ('<pre>');
    print_r($data);
    echo ('</pre>');
}

// header('Access-Control-Allow-Origin: http://test.com');
// header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

// windows host
// 127.0.0.1 blue-front.com
// 192.168.211.3 red-back.com
// redred 前端
// blue 後端
// cmd ipconfig IPv4 位址 每個人都不一樣

// header('Access-Control-Allow-Origin: http://blue-front.com:5501');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept');

$data = $_GET;

// $data = [
//     'num1' => 100,
//     'num2' => 2000
// ];

$data['sum'] = $data['num1'] + $data['num2'] + $data['num3'];
// dd($data);


// // echo ('HELLO');
// $data = [
//     'message' => 'test_ok',
//     'url' => $url
// ];

echo json_encode($data);
