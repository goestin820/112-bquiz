<!-- 自index.php剪下部分程式碼過來貼上 -->
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
}
.pos{
    width:100%;
    height:100%;
    /* 設定預告片img圖片預設值為不顯示 */
    display:none;
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
.icon img{
    width:60px;
    height:80px
}

.icon img:hover{
    border:1px solid white;
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
    <!-- 將原id和<ul>標籤元素刪除 -->
        <!-- <div id="abgne-block-20111227">
            <ul class="lists">
            </ul>
            <ul class="controls">
            </ul>
        </div> -->
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
// 設定第一章預告片img為顯示
$(".pos").eq(0).show();

    let now=0;
    let timer=setInterval(()=>{
                  ani();
             },3000);
    function ani(next){
        let now=$(".pos:visible").index()
        if(typeof(next)=='undefined'){
            next=(now+1 < $(".pos").length)?now+1:0;
            // console.log(next); 
        }
        switch($(".pos").eq(next).data('ani')){
            case 1:
                $(".pos").eq(now).fadeOut(1000,()=>{
                    $(".pos").eq(next).fadeIn(1000)
                })
                break;
            case 2:
                // hide在這裡功能等於縮小 + fadeout淡出
                $(".pos").eq(now).hide(1000,()=>{
                    // hide在這裡功能等於放大 + fadein淡入
                    $(".pos").eq(next).show(1000)
                })
                break;
            case 3:
                $(".pos").eq(now).slideUp(1000,()=>{
                    $(".pos").eq(next).slideDown(1000)
                })
                break;
        }
    }
    // 設定點擊icon會顯示該預告片img
    $(".icon").on("click",function(){
        let idx=$(this).index();
        ani(idx);
    })
    // 設定滑過icons會。。。
        $(".icons").hover(
        function(){
            clearInterval(timer)
        },
        function(){
            timer=setInterval(()=>{
                ani();
            },3000);
        }
    )

    let page=0;
    $(".right,.left").on("click",function(){
        if($(this).hasClass("right")){
            if(page<$(".icon").length-4){
                page++;
            } 
        }else{
            if(page>0){
                 page--
            }
        }
    $(".icon").animate({right:page*80});
})
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