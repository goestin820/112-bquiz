<?php
include_once "../base.php";
$table=$_POST['table'];
$db=ucfirst($table);

$rows='';

switch($table){
    case "admin":
        $rows=$_POST['acc'];
    break;
    case "image":
    case "mvim":
        $rows=$_POST['id'];
    break;
    default:
        $rows=$_POST['text'];
}

foreach($rows as $id => $row){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $$db->del($id);
    }else{
        $data=$$db->find($id);

        switch($table){
            case "title":
                $data['text']=$row;
                $data['sh']=($_POST['sh']==$id)?1:0;
            break;
            case "admin":
                $data['acc']=$row;
                $data['pw']=$_POST['pw'][$id];
            break;
            case "menu":
                $data['text']=$row;
                $data['href']=$_POST['href'][$id];
                $data['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            break; 
            default:
                if(isset($_POST['text'])){
                    $data['text']=$row;
                }
                $data['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;                
        }

        $$db->save($data);
    }

}


to("../backend.php?do=".$table);