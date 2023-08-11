<?php
include_once "../base.php";

// dd($_POST);
sort($_POST['seats']); // 將seats陣列實施排序
$_POST['qt']=count($_POST['seats']);

// $_POST['no']=$Order->max("no")+1;
$max_id=$Order->max('id')+1;
$_POST['no']=date("Ymd") . sprintf("%04d",$max_id);

// 因為陣列無法直接存入SQL，一定要先serialize將陣列轉為字串，才能存入SQL
$_POST['seats']=serialize($_POST['seats']);
// 將最新訂票情形存入Order資料表
$Order->save($_POST);

echo $_POST['no'];