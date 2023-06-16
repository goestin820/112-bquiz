<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$Admin->header;?></p>
    <form method="post" action="./api/update.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">帳號</td>
                    <td width="45%">密碼</td>
                    <td width="10%">刪除</td>
                </tr>
            <?php

                $rows=$Admin->all();
                foreach($rows as $row){
            ?>
                <tr>
                    <td>
                        <input type="text" name="acc[<?=$row['id'];?>]" value="<?=$row['acc'];?>" style='width:95%'>
                    </td>
                    <td>
                        <input type="password" name="pw[<?=$row['id'];?>]" value="<?=$row['pw'];?>">
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                    </td>
                    <td>
                        
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
                <input type="hidden" name="table" value='admin'>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/admin.php')" value="新增管理員"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>