<!-- 新增div+p+form -->
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$this->header;?>管理</p>
    <form method="post" action="./api/update.php">

<table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="68%"><?=$this->header;?></td>
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
                        <img src="./upload/<?=$row['img'];?>" style="width:150px;height:120px">
                    </td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>"  <?=($row['sh']==1)?'checked':'';?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                    </td>
                    <td>
                        <!-- <input type="button" value="更換動畫"> -->
                        <input type="button" value="更換動畫" 
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
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/add_form.php?table=<?=$this->table;?>')" value="新增<?=$this->header;?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

        </form>
</div>   