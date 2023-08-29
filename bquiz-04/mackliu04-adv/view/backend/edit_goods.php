<?php $row=$Goods->find($_GET['id']);?>
<h2 class="ct">修改商品</h2>
<form action="./api/save_goods.php" method="post" enctype="multipart/form-data">
<table class="all">
    <tr>
        <td class="tt ct">所屬大分類</td>
        <td class="pp">
            <select name="big" id="big">

            </select>
        </td>
    </tr>
    <tr>
        <td class="tt ct">所屬中分類</td>
        <td class="pp">
            <select name="mid" id="mid"></select>
        </td>
    </tr>
    <tr>
        <td class="tt ct">商品編號</td>
        <td class="pp" id="no">
            <?=$row['no'];?>
        </td>
    </tr>
    <tr>
        <td class="tt ct">商品名稱</td>
        <td class="pp">
            <input type="text" name="name" value="<?=$row['name'];?>">
        </td>
    </tr>
    <tr>
        <td class="tt ct">商品價格</td>
        <td class="pp">
            <input type="number" name="price" value="<?=$row['price'];?>">
        </td>
    </tr>
    <tr>
        <td class="tt ct">規格</td>
        <td class="pp">
            <input type="text" name="spec" value="<?=$row['spec'];?>">
        </td>
    </tr>
    <tr>
        <td class="tt ct">庫存量</td>
        <td class="pp">
            <input type="number" name="stock" value="<?=$row['stock'];?>">
        </td>
    </tr>
    <tr>
        <td class="tt ct">商品圖片</td>
        <td class="pp">
            <input type="file" name="img" id="img">
        </td>
    </tr>
    <tr>
        <td class="tt ct">商品介紹</td>
        <td class="pp">
            <textarea name="intro" id="intro" style="width:80%;height:150px"><?=$row['intro'];?></textarea>
        </td>
    </tr>
</table>    
<div class="ct">
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <input type="submit" value="修改">
    <input type="reset" value="重置">
    <input type="button" value="返回" onclick="location.href='?do=th'"></div>
</form>

<script>
getBigs();

$("#big").on("change",function(){
    getMids($("#big").val())
})

function getBigs(){
    $.get("./api/bigs.php",(bigs)=>{
        $("#big").html(bigs)
        $("#big option[value='<?=$row['big'];?>']").prop("selected",true);

        getMids($("#big").val())
    })
}



function getMids(id){
    $.get("./api/mids.php",{id},(mids)=>{
        $("#mid").html(mids)

            $("#mid option[value='<?=$row['mid'];?>']").prop("selected",true);

    })
}

</script>