<h3>新增動畫圖片</h3>
<hr>
<!-- <form action="./api/add_mvim.php" method="post" enctype="multipart/form-data"> -->
<form action="./api/add.php" method="post" enctype="multipart/form-data">

    <table>
        <tr>
            <td>動畫圖片：</td>
            <td><input type="file" name='img'></td>
        </tr>
        <tr>
            <!-- 在每個modal的程式碼中，新增hidden隱藏欄位 -->
            <input type="hidden" name="table" value="mvim">
            <td><input type="submit" value="新增"></td>
            <td><input type="reset" value="重置"></td>
        </tr>
    </table>
</form>