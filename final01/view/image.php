<style>
    a{
        text-decoration: none;
    }
    a:hover{
        text-decoration: underline;
    }
</style>
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
                $rows=$this->paginate(3);
                foreach($rows as $row){
            ?>
                <tr>
                    <td>
                        <img src="./upload/<?=$row['img'];?>" style="width:120px;height:80px">
                    </td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>"  <?=($row['sh']==1)?'checked':'';?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                    </td>
                    <input type="hidden" name="id[<?=$row['id'];?>]" value="<?=$row['id'];?>">
                    <td>
                        <input type="button" value="更換圖片" 
                        onclick="op('#cover','#cvr','./modal/update_img.php?table=<?=$this->table;?>&id=<?=$row['id'];?>')">
                        
                    </td>
                </tr>
            <?php
            }
            ?>                
            </tbody>
        </table>
        <div style="text-align:center">
            <?=$this->links();?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value='<?=$this->table;?>'>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/add_form.php?table=<?=$this->table;?>')" value="新增<?=$this->header;?>圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>
        </form>
</div>        