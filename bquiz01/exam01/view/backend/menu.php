<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$header;?></p>
    <form method="post" action="./api/update.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="30%">主選單名稱</td>
                    <td width="30%">選單連結網址</td>
                    <td width="10%">次選單數</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
            <?php
                foreach($rows as $row){
            ?>
                <tr>
                    <td>
                        <input type="text" name="text[<?=$row['id'];?>]" value="<?=$row['text'];?>">
                    </td>
                    <td>
                        <input type="text" name="href[<?=$row['id'];?>]" value="<?=$row['href'];?>">
                    </td>
                    <td>
                        <?=$row['subs'];?>
                    </td>
                    <td>
                        <input type="checkbox" name="sh[<?=$row['id'];?>]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                    </td>
                    <td>
                         <input type="checkbox" name="del[<?=$row['id'];?>]" value="<?=$row['id'];?>">
                    </td>
                    <td>
                    <input type="button"
                            onclick="op('#cover','#cvr','<?=$updateModal;?>?id=<?=$row['id'];?>')" value="<?=$updateBtn;?>">
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
                    <td width="200px">
                        <input type="button"
                            onclick="op('#cover','#cvr','<?=$modal;?>?id=<?=$row['id'];?>')" value="<?=$addbtn;?>">
                    </td>
                    <td class="cent">
                        <input type="hidden" name='table' value='<?=$table;?>'>
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>