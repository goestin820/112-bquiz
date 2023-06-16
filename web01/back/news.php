<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $News->header; ?></p>
    <form method="post" action="./api/update.php">
        <table width="100%">
            <tbody>
                <tr class="yel">

                    <td width="68%">替代文字</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>

                </tr>
                <?php

                $rows = $News->all();
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td>
                            <textarea name="text" style='width:95%;height:60px'><?= $row['text']; ?></textarea>
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
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
                    <input type="hidden" name="table" value='news'>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/news.php')" value="新增最新消息資料"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>