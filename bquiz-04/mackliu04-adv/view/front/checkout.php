<h2 class="ct">填寫資料</h2>
<?php $user=$User->find(['acc'=>$_SESSION['user']]);?>
<table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp">
                <?=$user['acc'];?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp">
                <input type="text" name="name" id="name" value="<?=$user['name'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp"><input type="text" name="tel" id="tel" value="<?=$user['tel'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">住址</td>
            <td class="pp"><input type="text" name="addr" id="addr" value="<?=$user['addr'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><input type="text" name="email" id="email" value="<?=$user['email'];?>"></td>
        </tr>
    </table>
    
<table class="all">
    <tr class="tt ct">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
    <?php
    $sum=0;
    foreach($_SESSION['cart'] as $id => $qt){
        $row=$Goods->find($id);
    ?>
    <tr class="pp ct">
        <td><?=$row['name'];?></td>
        <td><?=$row['no'];?></td>
        <td><?=$qt;?></td>
        <td><?=$row['price'];?></td>
        <td><?=$row['price']*$qt;?></td>

    </tr>
    <?php
        $sum += $row['price']*$qt;
    }
    ?>
</table>
<div class="all tt ct">總價:<?=$sum;?></div>
<div class="ct">
        <input type="hidden" name="sum" id="sum" value="<?=$sum?>">
        <input type="button" value="確定送出" onclick="checkout()">
        <input type="button" value="返回修改訂單" onclick="location.href='?do=buycart'">
    </div>
<script>
function checkout(){
    let user={};
    user.name=$("#name").val();
    user.tel=$("#tel").val();
    user.addr=$("#addr").val();
    user.email=$("#email").val();
    user.total=$("#sum").val();

    $.post("./api/checkout.php",user,()=>{
        alert("訂購完成\n感謝您的選購")
        location.href='index.php';
    })
}
</script>