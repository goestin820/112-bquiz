<?php

// header('Access-Control-Allow-Origin: http://test.com');
// header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept');

// echo ('HELLO');
$data = [
    'message' => 'test_ok'
];

echo json_encode($data);
