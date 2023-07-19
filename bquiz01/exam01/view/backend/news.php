<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$header;?></p>
    <form method="post" action="./api/update.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="68%">最新消息資料內容</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                </tr>
            <?php
                foreach($rows as $row){
            ?>
                <tr>
                    <td width="68%">
                        <textarea name="text[<?=$row['id'];?>]" style="width:95%;height:60px;"><?=$row['text'];?></textarea>
                    </td>
                    <td width="7%">
                        <input type="checkbox" name="sh[<?=$row['id'];?>]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                    </td>
                    <td width="7%">
                         <input type="checkbox" name="del[<?=$row['id'];?>]" value="<?=$row['id'];?>">
                    </td>
                </tr>
            <?php
                }
            ?>                
            </tbody>
        </table>
        <div class="cent"><?=$links;?></div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button"
                            onclick="op('#cover','#cvr','<?=$modal;?>')" value="<?=$addbtn;?>">
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