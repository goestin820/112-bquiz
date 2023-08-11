<?php
$order=$Order->find(['no'=>$_GET['no']]);
?>
<style>
.order{
    border:1px solid black;
    width:65%;
    margin:auto;
    padding:20px;
    background:#ccc;
} 
.order div{
    border:1px solid #555;
}
.order div:nth-child(odd){
    background:#ccc; 
}
.order div:nth-child(even){
    background:#999;
}
</style>
<div class="order">
    <div>感謝您的訂購，您的訂單編號是：<?=$_GET['no'];?></div>
    <div>
       電影名稱: <?=$order['movie'];?>
    </div>
    <div>
        日期:<?=$order['date'];?>
    </div>
    <div>
        場次時間:<?=$order['session'];?>
    </div>
    <div>
        座位:<br>
        <?php
            $seats=unserialize($order['seats']);
            foreach($seats as $seat){
                echo (floor($seat/5)+1)."排".(($seat%5)+1)."號";
                echo "<br>";
            }
            echo "共{$order['qt']}張電影票";
        ?>
    </div>
    <div class="ct">
        <button onclick="location.href='index.php'">確認</button>
    </div>
</div>