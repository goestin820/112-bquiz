<!-- 從api/add_movie.php整個複製程式碼過來修改 -->
<?php include_once "../base.php";

if(!empty($_FILES['trailer']['tmp_name'])){
    $_POST['trailer']=$_FILES['trailer']['name'];
    move_uploaded_file($_FILES['trailer']['tmp_name'],"../upload/".$_FILES['trailer']['name']);
}

if(!empty($_FILES['poster']['tmp_name'])){
    $_POST['poster']=$_FILES['poster']['name'];
    move_uploaded_file($_FILES['poster']['tmp_name'],"../upload/".$_FILES['poster']['name']);
}

$_POST['ondate']=$_POST['year']. '-' . $_POST['month']. '-' . $_POST['day'];
unset($_POST['year'],$_POST['month'],$_POST['day']);

// $_POST['sh']=1;
// $_POST['ani']=rand(1,3);
// $_POST['rank']=$Movie->max('id')+1;
// 將以上3行不需要用到的程式碼刪除即可

$Movie->save($_POST);

to("../backend.php?do=movie");