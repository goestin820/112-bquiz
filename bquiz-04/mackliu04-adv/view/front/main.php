<h2>
<?php
$type=$_GET['type']??0;
echo $Type->nav($type);?>
</h2>
<style>

.block{
    width:80%;
    margin: 2px auto;
    min-width: 150px;;
    display: flex;
}
.block > div:nth-child(1){
    width:40%;
    display:flex;
    justify-content: center;
    align-items: center;
    padding:10px;
}
.block > div:nth-child(1) img{
    width:150px;
    height:120px;
}
.block > div:nth-child(2){
    width:60%;
}
.block .info{
    border:1px solid white;
}
.block .info:nth-child(1){
    border-top:none;

}
.block .info:nth-child(4){
    border-bottom:none;
}
</style>
<?php 
$items=$Type->items($type);
foreach ($items as $item) {
?>
<div class="block">
    <div class="pp ct">
        <a href='?do=intro&id=<?=$item['id'];?>'>
            <img src="./upload/<?=$item['img'];?>" alt="">
        </a>
    </div>
    <div class="pp">
        <div class="info tt ct"><?=$item['name'];?></div>
        <div class="info pp">
            價錢:<?=$item['price'];?>
            <a href="javascript:buy(<?=$item['id'];?>,1)" style="float:right">
                <img src="./icon/0402.jpg" alt="">
            </a>
        </div>
        <div class="info pp">
            規格:<?=$item['spec'];?>
        </div>
        <div class="info pp">
            簡介:<?=$item['intro'];?>
        </div>
    </div>
</div>

<?php
}
?>

<script>
function buy(id,qt){
$.post("./api/buy.php",{id,qt},()=>{
    chkCart();
})
}
</script>