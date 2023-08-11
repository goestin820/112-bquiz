<?php
include_once "../base.php";
?>
<style>
.theater *,
.info *{
    box-sizing: border-box;
}
.theater{
    width:540px;
    height:370px;
    background-image:url("../icon/03D04.png");
    background-position: center;
    background-repeat: no-repeat;
    margin: auto;
}

.info{
    width:540px;
    min-height:100px;
    background:#ccc;
    margin:auto;
    padding:5px 10%;
}

.seats{
    width: 315px;
    height: 340px;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
    padding-top:18px;
}

.seat{
    width: 63px;  
    height: 85px;
    text-align: center;
    position: relative;
}

.seat input{
    position:absolute;
    right:1px;
    bottom:1px;
}

.null{
    background-image: url("../icon/03D02.png");
    background-position: center;
    background-repeat: no-repeat;
}

.booked{
    background-image: url("../icon/03D03.png");
    background-position: center;
    background-repeat: no-repeat;
}
</style>

<div class="theater">
    <div class="seats">
        <?php
            $seats=$Order->seats($_GET);
            for($i=0;$i<20;$i++){
                $str=(floor($i/5)+1)."排".(($i%5)+1)."號";
        ?>
        <!-- <div class="seat null">X排X號 -->
        <!-- <div class="seat <=(in_array($i,$seats))?'booked':'null';?>">X排X號 -->
        <div class="seat <?=(in_array($i,$seats))?'booked':'null';?>"><?=$str;?>    
            <!-- <input type="checkbox" name="seat" id=""> -->
            <?php if(!in_array($i,$seats)){
                // echo "<input type='checkbox' name='seat' id=''>";
                echo "<input type='checkbox' name='seat' value='{$i}'>";
            }
            ?>
        </div>
        <?php
         }
        ?>
    </div>
</div>
<div class="info ct">
    <div>您選擇的電影是:<?=$_GET['movie'];?></div>
    <div>您選擇的時刻是:<?=$_GET['date'];?> <?=$_GET['session'];?></div>
    <div>您已經勾選<span id='tickets'></span>張票，最多可以購買四張票</div>
    <div class="ct">
        <button onclick="$('#form,#booking').toggle()">上一步</button>  
        <button onclick="checkout()">訂購</button>
    </div>
</div>

<script>
let seats=[];
$(".seat input").on("click",function(){

    if($(this).prop("checked")){
        if(seats.length>=4){
            alert("最多只能訂購四張票")
            $(this).prop("checked",false);
        }else{
            // 假如checkbox未勾選超過4張的話，就將資料新增至seats[]陣列
            seats.push($(this).val())
        }
    }else{
        // 假如checkbox取消勾選的話，就將該取消欄位的seats[]陣列資料移除
        seats.splice(seats.indexOf($(this).val()),1)
    }

    $("#tickets").text(seats.length)
})

function checkout(){
    order.seats = seats;
    console.log(order);
    $.post('./api/checkout.php',order,(no)=>{
        location.href=`?do=checkout&no=${no}`;
    })
}

</script>