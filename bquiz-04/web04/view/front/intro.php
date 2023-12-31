<?php
$row = $Goods->find($_GET['id']);
?>

<style>
    .item * {
        box-sizing: border-box;
    }

    /* 將img圖片和文字說明，分別擺放至左邊及右邊的位置 */
    .item {
        display: flex;
    }

    .item>div:nth-child(1) {
        width: 60%;
        padding: 10px;
        height: 350px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .item img {
        width: 100%;
        height: 100%;
    }

    .item>div:nth-child(2) {
        width: 40%;
    }

    /* 將右邊文字說明，用flex-wrap方式將空白處填滿 */
    .info {
        display: flex;
        flex-wrap: wrap;
    }

    .info div {
        margin: 1px 0;
        padding: 2px;
        width: 100%;
    }
</style>

<h2 class="ct"><?= $row['name']; ?></h2>
<div class="item all">
    <div class="pp">
        <img src="./upload/<?= $row['img']; ?>" alt="">
    </div>
    <div class="info">
        <div class="pp">分類:<?= $Type->nav($row['mid']); ?></div>
        <div class="pp">編號:<?= $row['no']; ?></div>
        <div class="pp">價格:<?= $row['price']; ?></div>
        <div class="pp">詳細說明:<?= $row['intro']; ?></div>
        <div class="pp">庫存量:<?= $row['stock']; ?></div>
    </div>
</div>
<div class="ct tt all">
    購買數量:
    <input type="number" name="qt" id="qt" value="1" style="width:35px">
    <!-- <img src="./icon/0402.jpg"> -->
    <a href="javascript:buy(<?= $row['id']; ?>)"><img src="./icon/0402.jpg"></a>
</div>
<script>
    function buy(id) {
        let qt = $("#qt").val()
        location.href = `?do=buycart&id=${id}&qt=${qt}`
    }
</script>