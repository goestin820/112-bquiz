<h2 class="ct">會員管理</h2>
<table class="all">
    <tr class="ct">
        <td class="tt">姓名</td>
        <td class="tt">會員帳號</td>
        <td class="tt">註冊日期</td>
        <td class="tt">操作</td>
    </tr>
    <?php
    foreach($rows as $row){
    ?>
    <tr class="ct">
        <td class="pp"><?=$row['name'];?></td>
        <td class="pp"><?=$row['acc'];?></td>
        <td class="pp"><?=$row['regdate'];?></td>
        <td class="pp">
            <button onclick="location.href='?do=edit_user&id=<?=$row['id'];?>'">修改</button>
            <button onclick="del('User',<?=$row['id'];?>)">刪除</button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<div class="ct">
    <button onclick="location.href='index.php'">返回</button>
</div>