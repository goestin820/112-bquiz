<h3 class="cent">更新標題區圖片</h3>
<hr>
<form action="./api/upload.php" method='post' enctype="multipart/form-data">
    <table style="width:70%;margin:auto">
        <tr>
            <td>標題區圖片：</td>
            <td><input type="file" name="img" ></td>
        </tr>
    </table>
<div class="cent">
    <input type="hidden" name="table" value="title">
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <input type="submit" value="更新">
    <input type="reset" value="重置">
</div>    
</form>