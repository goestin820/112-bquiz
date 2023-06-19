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
                $rows=$this->all();
                foreach($rows as $row){
            ?>
                <tr>
                    <td>
                        <input type="text" name="text[<?=$row['id'];?>]" value="<?=$row['text'];?>">
                    </td>
                    <td>
                        <input type="text" name="href[<?=$row['id'];?>]" value="<?=$row['href'];?>">
                    </td>
                    <td></td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':''?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                    </td>
                    <td>
                        <button type="button">編輯次選單</button>
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
                    <input type="hidden" name="table" value='<?=$this->table;?>'>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/add_form.php?table=<?=$this->table;?>')" value="新增主<?=$this->header;?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>