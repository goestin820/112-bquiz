<?php 
if(isset($_POST['bottom'])){
    $_POST['id']=1;
    $Bottom->save($_POST);
}

?>
<h2 class="ct">編輯頁尾版權區</h2>
<form action="?do=bot" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">頁尾宣告內容</td>
            <td class="pp"><input type="text" name="bottom" value="<?=$Bottom->bot();?>"></td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="編輯"><input type="reset" value="重置"></div>
</form>