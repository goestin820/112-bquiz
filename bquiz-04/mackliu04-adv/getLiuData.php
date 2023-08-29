<?php

// header('Access-Control-Allow-Origin: http://blue-front.com:5501');

header('Access-Control-Allow-Origin: http://kai-front.com:5501');
// header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept');

function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "<pre>";
}


$data = $_GET;
// dd($data);

$data['sum'] =  ($data['num1'] + $data['num2']) * $data['num3'];


// $data = [
//     's1' => 'amy',
//     's2' => 'bob',
//     's3' => 'cat'
// ];

// dd($data);

echo json_encode($data);
