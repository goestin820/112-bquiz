<?php include_once "../base.php";

if(isset($_POST['del'])){
    foreach ($_POST['del'] as $id) {
        // echo $id;
        $User->del($id);
    }
}

to("../backend.php?do=user");