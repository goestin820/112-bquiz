<?php 
include_once "../base.php";
$rows=$Type->all(['big'=>0]);
foreach($rows as $row){
    echo "<option value='{$row['id']}'>{$row['name']}</option>";
}