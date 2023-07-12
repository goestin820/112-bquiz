
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$header;?></p>
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

                foreach($rows as $row){
                    extract($row);
            ?>
                <tr>
                    <td>
                        <img src="./upload/<?=$img;?>" style="width:300px;height:30px">
                    </td>
                    <td>
                        <input type="text" name="text[<?=$id;?>]" value="<?=$text;?>">
                    </td>
                    <td>
                        <input type="radio" name="sh" value="<?=$id;?>" <?=($sh==1)?'checked':'';?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$id;?>">
                    </td>
                    <td>
                        <input type="button" value="更新圖片"
                            onclick="op('#cover','#cvr','./modal/update_img.php?table=<?=$table;?>&id=<?=$id;?>')">
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
                    <input type="hidden" name="table" value='<?=$table;?>'>
                    <td width="200px"><input type="button"
                            onclick="op('#cover','#cvr','./modal/add_form.php?table=<?=$table;?>')"
                            value="<?=$addButton;?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>