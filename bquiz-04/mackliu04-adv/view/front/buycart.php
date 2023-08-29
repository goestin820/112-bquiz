<?php

if(isset($_GET['id']) && isset($_GET['qt'])){
    $_SESSION['cart'][$_GET['id']]=$_GET['qt'];
}

if(!isset($_SESSION['user'])){
    to("?do=login");
}

echo "<h1 class='ct'>{$_SESSION['user']}的購物車</h2>";

if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
?>
<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr>
    <?php
    
    foreach($_SESSION['cart'] as $id => $qt){
        $row=$Goods->find($id);
    ?>
    <tr class="pp ct">
        <td><?=$row['no'];?></td>
        <td><?=$row['name'];?></td>
        <td><?=$qt;?></td>
        <td><?=$row['stock'];?></td>
        <td><?=$row['price'];?></td>
        <td><?=$row['price']*$qt;?></td>
        <td>
            <img src="./icon/0415.jpg" onclick="delCart(<?=$id;?>)">
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<div class="ct">
    <img src="./icon/0411.jpg" onclick="location.href='index.php'">
    <img src="./icon/0412.jpg" onclick="location.href='?do=checkout'">
</div>
<script>
function delCart(id){
    $.post("./api/del_cart.php",{id},()=>{
        location.href='index.php?do=buycart';
    })
}

</script>

<?php 
}else{
    echo "<h2 class='ct'>你的購物車中目前沒有商品，請前往賣場購買</h2>";
}
