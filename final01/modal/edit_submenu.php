<?php
include_once "../base.php";

?>
<h2 class='cent'>編輯次選單</h2>
<hr>
<form action="./api/submenu.php" method="post">
<table style="width:70%;margin:auto" id="sub">
    <tr>
        <td>次選單名稱</td>
        <td>次選單連結網址</td>
        <td>刪除</td>
    </tr>
    <?php
    $rows=$Menu->all(['main_id'=>$_GET['main_id']]);
    foreach($rows as $row){
    ?>
    <tr>
        <td><input type="text" name='text[<?=$row['id'];?>]' value='<?=$row['text'];?>'></td>
        <td><input type="text" name='href[<?=$row['id'];?>]' value='<?=$row['href'];?>'></td>
        <td><input type="checkbox" name='del[]' value='<?=$row['id'];?>'></td>
    </tr>

    <?php
    }
    ?>
</table>
<div style="text-align:center">
    <input type="hidden" name="main_id" value="<?=$_GET['main_id'];?>">
    <input type="submit" value="修改確定">
    <input type="reset" value="重置">
    <input type="button" value="更多次選單" onclick="more()">
</div>
</form>
<script>
function more(){
    let input=`    <tr>
        <td><input type="text" name='text2[]' value=''></td>
        <td><input type="text" name='href2[]' value=''></td>
        <td></td>
    </tr>`

    $("#sub").append(input);

}

</script>