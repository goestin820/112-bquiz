<!-- 自modal/add_form.php複製整個程式碼過來 -->

<?php
include_once "../base.php";
$table=$_GET['table'];
$db=ucfirst($table);
$$db->add_form();
?>

<!-- 將下列程式碼整個複製至base.php，新增一個function名稱為modal -->
<!-- 利用繼承的方式在父類別DB增加一個modal的表單產生函式，並可在子類別做呼叫 -->
<!-- <h3><$$db->add_header;?></h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <$$db->add_form();?>
        <tr>
        <input type="hidden" name="table" value='<=$table;?>'>
            <td><input type="submit" value="新增"></td>
            <td><input type="reset" value="重置"></td>
        </tr>
    </table>
</form> -->