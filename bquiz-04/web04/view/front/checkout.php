<!-- 購物車結帳資料確認頁面 -->
<h2 class="ct">填寫資料</h2>

<?php $user=$User->find(['acc'=>$_SESSION['user']]);?>

<!-- 可直接複製.view/front/reg.php的程式碼過來修改 -->
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
                <input type="text" name="name" id="name" value="<?=$user['name'];?>">
            </td>
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

<!-- 可直接複製.view/front/buycart.php的程式碼過來修改 -->
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
    $sum=0;
    foreach($_SESSION['cart'] as $id => $qt){
        // 尋找到該id的商品列
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
        <!-- <input type="button" value="確定送出" onclick="reg()"> -->
        <input type="button" value="確定送出" onclick="checkout()">
        <!-- <input type="button" value="返回修改訂單"> -->
        <input type="button" value="返回修改訂單" onclick="location.href='?do=buycart'">
    </div>
<script>

// function reg(){
function checkout(){
    let user={};
    user.name=$("#name").val();
    // user.acc=$("#acc").val();
    // user.pw=$("#pw").val();
    user.tel=$("#tel").val();
    user.addr=$("#addr").val();
    user.email=$("#email").val();
    // user.regdate=$("#regdate").val();
    user.total=$("#sum").val();

    // $.get("./api/chk_acc.php",{acc:user.acc},(res)=>{
    $.post("./api/checkout.php",{acc:user.acc},(res)=>{
        // if(parseInt(res)==1 || $("#acc").val()=='admin'){
        //     alert("此帳號已被使用");
        // }else{
        //     $.post("./api/reg.php",user,()=>{
        //         alert("註冊成功，歡迎加入")
        //         location.href="?do=login";
        //     })
        // }
        alert("訂購完成\n感謝您的選購");
        location.href='index.php';  //將頁面導回index首頁
    })
}
</script>