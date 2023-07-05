<?php
include_once "../../base.php";

$subs=$Menu->all(['main_id'=>$_GET['id']]);

?>
<h3 class="cent">編輯次選單</h3>
<hr>
<form action="./api/submenu.php" method='post' enctype="multipart/form-data">
    <table style="width:70%;margin:auto" id="submenu">

        <tr>
            <td>主選單名稱：</td>
            <td>選單連結網址：</td>
            <td>刪除</td>
        </tr>
        <?php
        foreach($subs as $sub){
        ?>
        <tr>
            <td><input type="text" name="text[<?=$sub['id'];?>]" value="<?=$sub['text'];?>"></td>
            <td><input type="text" name="href[<?=$sub['id'];?>]" value="<?=$sub['href'];?>"></td>
            <td><input type="checkbox" name="del[<?=$sub['id'];?>]" value="<?=$sub['id'];?>"></td>
        </tr>
        <?php
        }
        ?>
    </table>
<div class="cent">
    <input type="hidden" name="table" value="menu">
    <input type="hidden" name="main_id" value="<?=$_GET['id'];?>">

    <input type="submit" value="修改確認">
    <input type="reset" value="重置">
    <input type="button" value="更多次選單" onclick="more()">
</div>    
</form>
<script>
    function more(){
        let row=`<tr>
                    <td><input type="text" name="text2[]"></td>
                    <td><input type="text" name="href2[]"></td>
                    <td></td>
                 </tr>`
        $("#submenu").append(row);
    }
</script>