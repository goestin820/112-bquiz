<!-- 從./view/front/checkout.php複製程式碼過來修改 -->

<!-- <h2 class="ct">填寫資料</h2> -->
<!-- <php $user=$User->find(['acc'=>$_SESSION['user']]);?> -->
<?php
$row=$Order->find($_GET['id']);
?>
<h2 class="ct">
    訂單編號
    <span style='color:red'><?=$row['no'];?></span>
    的詳細資料
</h2>

<table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp">
                <!-- <=$user['acc'];?> -->
                <?=$row['acc'];?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp">
                <!-- <input type="text" name="name" id="name" value="<=$user['name'];?>"> -->
                <?=$row['name'];?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp">
                <!-- <input type="text" name="tel" id="tel" value="<=$user['tel'];?>"> -->
                <?=$row['tel'];?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">住址</td>
            <td class="pp">
                <!-- <input type="text" name="addr" id="addr" value="<=$user['addr'];?>"> -->
                <?=$row['addr'];?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp">
                <!-- <input type="text" name="email" id="email" value="<=$user['email'];?>"> -->
                <?=$row['email'];?>
            </td>
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
    // 先設定總價$sum初始值為0
    // $sum=0;
    // foreach($_SESSION['cart'] as $id => $qt){
        $cart=unserialize($row['cart']);
        foreach($cart as $id => $qt){
        // 尋找到該id的商品列
        // $row=$Goods->find($id);
        $item=$Goods->find($id);
    ?>

    <tr class="pp ct">
        <!-- <td><=$row['name'];?></td>
        <td><=$row['no'];?></td>
        <td><=$qt;?></td>
        <td><=$row['price'];?></td>
        <td><=$row['price']*$qt;?></td> -->
        <td><?=$item['name'];?></td>
        <td><?=$item['no'];?></td>
        <td><?=$qt;?></td>
        <td><?=$item['price'];?></td>
        <td><?=$item['price']*$qt;?></td>
    </tr>

    <?php
        // $sum += $row['price']*$qt;
    }
    ?>
</table>

<!-- <div class="all tt ct">總價:<=$sum;?></div> -->
<div class="all tt ct">總價:<?=$row['total'];?></div>
<div class="ct">
        <!-- <input type="button" value="確定送出" onclick="checkout()"> -->
        <!-- <input type="button" value="返回修改訂單" onclick="location.href='?do=buycart'"> -->
        <button onclick="location.href='?do=order'">返回</button>
    </div>

<!-- <script>
function checkout(){
    let user={};
    user.name=$("#name").val();
    user.tel=$("#tel").val();
    user.addr=$("#addr").val();
    user.email=$("#email").val();
    user.total=$("#sum").val();

    
    $.post("./api/checkout.php",{acc:user.acc},(res)=>{
        alert("訂購完成\n感謝您的選購");
        location.href='index.php';  //將頁面導回index首頁
    })
}
</script> -->