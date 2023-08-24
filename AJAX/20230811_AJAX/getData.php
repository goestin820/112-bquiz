<?php

// echo "hello";

function dd($data){
echo '<pre>';
print_r($data);
echo '</pre>';
}


$data=[
    's1'=>'amy',
    's2'=>'bob',
    's3'=>'cat'
];

echo json_encode($data);



