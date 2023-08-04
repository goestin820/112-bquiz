<style>
    .movie{
        display:flex;
        align-items: center;
        min-height:100px;
        background-color: white;
        color:black;
        margin:3px 0;
        padding:2px;
    }
    .col:nth-child(1),
    .col:nth-child(2){
        width:15%;
    }
    .col:nth-child(3){
        /* width:70%; */
        /* flex-grow為總寬度-已使用寬度 */
        flex-grow:1;
    }
    .row:nth-child(1){
        display:flex;
        justify-content: space-between;
    }
</style>

<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>

<!-- 設定新增電影版面的高度為450px，若超過高度則改為捲軸 -->
<div style="overflow:auto;height:450px">
<?php
foreach($rows as $idx=> $row){
    $prev=($idx==0)?$row['id']:$rows[$idx-1]['id'];
    $next=($idx==array_key_last($rows))?$row['id']:$rows[$idx+1]['id'];    
?>
<div class="movie">
    <div class="col">
        <img src="./upload/<?=$row['poster'];?>" style="width:80px;height:110px;">
    </div>
    <div class="col">
        分級: <img src="./icon/03C0<?=$row['level'];?>.png" style="width:25px;height:25px">
    </div>
    <div class="col">
        <div class="row">
            <div class="info">片名:<?=$row['name'];?></div>
            <div class="info">片長:<?=$row['length'];?></div>
            <div class="info">上映時間:<?=$row['ondate'];?></div>
        </div>
        <div class="row">
            <!-- <button class="show" data-id="<=$row['id'];?>">顯示</button> -->
            <button class="show" data-id="<?=$row['id'];?>"><?=($row['sh']==1)?"顯示":"隱藏";?></button>
            <button class="sw" data-sw="<?=$row['id'];?>-<?=$prev;?>">往上</button>
            <button class="sw" data-sw="<?=$row['id'];?>-<?=$next;?>">往下</button>
            <!-- <button class="edit" data-id="<=$row['id'];?>">編輯電影</button> -->
            <button class="edit" data-id="<?=$row['id'];?>" onclick="location.href='?do=edit_movie&id=<?=$row['id'];?>'">編輯電影</button>
            <button class="del" data-id="<?=$row['id'];?>">刪除電影</button>
        </div>
        <div class="row">
            劇情介紹:<?=$row['intro'];?>
        </div>
    </div>
</div>
<?php
}
?>

</div>

<script>
$(".sw").on("click",function(){
    let id=$(this).data('sw').split("-")
    // $.post("./api/sw.php",{table:'Movie',id},(res)=>{
    // $.post("./api/sw.php",{table:'Movie',id},()=>{
    $.post("./api/sw.php",{table:'Movie',id:'id'},()=>{
            location.reload();
    })
})

$(".show").on("click",function(){
    // let id=$(this).data('sw').split("-")
    // $.post("./api/sw.php",{table:'Movie',id},(res)=>{
    $.post("./api/show.php",{id:$(this).data('id')},()=>{
          // location.reload();
        switch($(this).text()){
            case "顯示":
                $(this).text("隱藏")
            break;
            case "隱藏":
                $(this).text("顯示")
            break;
        }
    })
})

$(".del").on("click",function(){
    // let id=$(this).data('sw').split("-")
    $.post("./api/del.php",{table:'Movie',id:$(this).data('id')},()=>{
            location.reload();
    })
})
</script>

