<table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%"><?=$this->header;?></td>
                    <td width="23%">替代文字</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
            <?php

                $rows=$this->all();
                foreach($rows as $row){
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
                        <!-- <input type="button" value="更新圖片"> -->
                        <input type="button" value="更新圖片" 
                            onclick="op('#cover','#cvr','./modal/update_img.php?table=<?=$this->table;?>&id=<?=$row['id'];?>')">
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
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/add_form.php?table=<?=$this->table;?>')" value="新增<?=$this->header;?>圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>