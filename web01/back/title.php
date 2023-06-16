<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <!-- <p class="t cent botli">網站標題管理</p> -->
    <p class="t cent botli"><?=$Title->header;?></p>

    <!-- <form method="post" target="back" action="?do=tii"> 將target="back"刪除-->
    <!-- <form method="post" action="?do=tii"> -->
    <!-- <form method="post" action="./api/update_title.php"> -->
    <form method="post" action="./api/update.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">網站標題</td>
                    <td width="23%">替代文字</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>

                <?php
                $rows = $Title->all();
                foreach ($rows as $row) {
                ?>
                <tr>
                    <td>
                        <img src="./upload/<?=$row['img'];?>" style="width:300px;height:30px">
                    </td>
                    <td>
                        <input type="text" name="text[<?=$row['id'];?>]" value="<?=$row['text'];?>">
                    </td>
                    <td>
                        <input type="radio" name="sh" value="<?=$row['id'];?>"  <?=($row['sh']==1)?'checked':'';?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                    </td>
                    <td>
                        <input type="button" value="更新圖片">
                        
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                <input type="hidden" name="table" value='title'>
                <!-- AJAX功能   op彈跳視窗-->
                    <!-- <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/title.php')" value="新增網站標題圖片"></td> -->
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/title.php')" value="新增網站標題圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>