<style>
.posters *,
.controls *{
    box-sizing: border-box;
}
.posters{
    width:210px;
    height:240px;
    margin:2px auto;
    border:1px solid white;
    overflow: hidden;
    position:relative;
}
.pos{
    width:100%;
    height:100%;
    display:none;
    position:absolute;
    top:0;
    left:0;
}
.pos img{
    width:100%;
    height:85%;
}
.pos .name{
    text-align: center;
}
.controls {
    display:flex;
    align-items: center;
    justify-content: space-between;
}
.icons{
    width:320px;
    height:110px;
    border:1px solid white;
    overflow: hidden;
    display: flex;
}
.icon{
    width:80px;
    height:110px;
    padding:0 5px;
    text-align: center;
    flex-shrink: 0;
    position: relative;
}
.icon img:hover{
    border:1px solid white;
}
.icon img{
    width:60px;
    height:80px
}
.icon div{
    font-size:12px;
}
.right,.left{
    border-top:25px solid transparent;
    border-bottom:25px solid transparent;
}
.right{
    
    border-left:30px solid green;
}
.left{
    border-right:30px solid green;
}
</style>
<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div class="posters">
            <?php 
                $rows=$Poster->posters();
                foreach($rows as $row){
            ?>
            <div class="pos" data-ani="<?=$row['ani'];?>">
                <img src="./upload/<?=$row['img'];?>" alt="">
                <div class="name"><?=$row['name'];?></div>
            </div>
            <?php 
                }
            ?>  
        </div>
        <div class="controls">
            <div class="left"></div>
            <div class="icons">
                <?php 
                foreach($rows as $row){
                ?>
                <div class="icon">
                    <img src="./upload/<?=$row['img'];?>" alt="">
                    <div><?=$row['name'];?></div>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="right"></div>
        </div>
    </div>
</div>
<script>
$(".pos").eq(0).show()
let now=0;
let timer=setInterval(()=>{
            ani();
        },3000);
function ani(next){
    let now=$(".pos:visible").index()
    if(typeof(next)=='undefined'){
        next=(now+1 < $(".pos").length)?now+1:0;
    }
    switch($(".pos").eq(next).data('ani')){
        case 1:
            $(".pos").eq(now).fadeOut(2000)
            $(".pos").eq(next).fadeIn(2000)
        break;
        case 2:
            //縮放
            $(".pos").eq(next).css({width:0,height:0,left:105,top:120})
            $(".pos").eq(now).animate({ width:0,height:0,left:105,top:120},1000,
                ()=>{
                        $(".pos").eq(now).hide()
                        $(".pos").eq(now).css({ width:210,hiegh:240,left:0,top:0})
                        $(".pos").eq(next).show()
                        $(".pos").eq(next).animate({width:210,height:240,left:0,top:0},1000)
            })
        break;
        case 3:
            //滑入滑出
            $(".pos").eq(now).animate({left:-210},1000,()=>{
                $(".pos").eq(now).hide()
                $(".pos").eq(now).css({left:0})
            })
            $(".pos").eq(next).css({left:210}).show()
            /* $(".pos").eq(next).show() */
            $(".pos").eq(next).animate({left:0},1000)
        break;
    }
}
</script>




<style>
.movies *{
    box-sizing: border-box;
}
.movies{
    display:flex;
    flex-wrap:wrap;
    justify-content: space-evenly;
    height:270px;
    align-items: start;
}
.movie{
    width:48%;
    border:1px solid white;
    padding:5px;
    border-radius: 5px;
    margin:2px 0;
}
.row{
    display:flex;
    justify-content: center;
    align-items: center;
}
.poster{
    width:30%;
    height:90px;
}
.info div:nth-child(1){
    font-size:18px;
}
</style>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:100%;">
        <!-- 將以下<table>元素內容刪除，改為<div>-->
        <!-- <table>
            <tbody>
                <tr> </tr>
            </tbody>
        </table> -->
        <div class='movies'>
        <?php
        $rows=$Movie->movies();
        foreach($rows as $row){
        ?>
            <div class="movie">
                <div class="row">
                    <div class="poster">
                        <a href="?do=intro&id=<?=$row['id'];?>">
                            <img src="./upload/<?=$row['poster'];?>" style="width:100%;height:100%">
                        </a>
                    </div>
                    <div class="info">
                        <div>
                            <?=$row['name'];?>
                        </div>
                        <div>分級:
                            <img src="./icon/03C0<?=$row['level'];?>.png" style="width:20px;height:20px">
                            <?=$Movie->level($row['level']);?>
                        </div>
                        <div>
                            上映日期:<?=$row['ondate'];?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button onclick="location.href='?do=intro&id=<?=$row['id'];?>'">劇情簡介</button>
                    <button onclick="location.href='?do=order&id=<?=$row['id'];?>'">線上訂票</button>
                </div>
            </div>
                <?php
                }
                ?>
        </div>
        <div class="ct pagi">
            <?=$Movie->links();?>
        </div>
    </div>
</div>
