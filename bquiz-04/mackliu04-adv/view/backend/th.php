<h2 class="ct">商品分類</h2>
<div class="ct">
    <label for="">新增大分類</label>
    <input type="text" name="big" id="big">
    <button onclick="addType('big')">新增</button>
</div>
<div class="ct">
    <label for="">新增中分類</label>
    <select name="bigs" id="bigs"></select>
    <input type="text" name="mid" id="mid">
    <button onclick="addType('mid')">新增</button>
</div>
<table class="all">
    <?php 
    $bigs=$Type->all(['big'=>0]);
    foreach($bigs as $big){
    ?>
    <tr class="tt">
        <td><?=$big['name'];?></td>
        <td class="ct">
            <button onclick="edit(this,<?=$big['id'];?>)">修改</button>
            <button onclick="del('Type',<?=$big['id'];?>)">刪除</button>
        </td>
    </tr>
        <?php 
            if($Type->hasMid($big['id'])>0){
                $mids=$Type->getMids($big['id']);
                foreach($mids as $mid){
                ?>
                <tr class="pp ct">
                    <td><?=$mid['name'];?></td>
                    <td>
                        <button onclick="edit(this,<?=$mid['id'];?>)">修改</button>
                        <button onclick="del('Type',<?=$mid['id'];?>)">刪除</button>
                    </td>
                </tr>                
            <?php
            }
        }
    }
    ?>
</table>

<script>
getBigs();

function addType(type){
    let data
    switch(type){
        case "big":
            data={name:$(`#${type}`).val(),big:0}
        break;
        case "mid":
            data={name:$(`#${type}`).val(),big:$("#bigs").val()}
        break;
    }
    $.post("./api/save_type.php",data,()=>{
        location.reload();
    })
}

function getBigs(){
    $.get("./api/bigs.php",(bigs)=>{
        $("#bigs").html(bigs)
    })
}

function edit(dom,id){
    let text=$(dom).parent().prev().text()
    let name=prompt("請輸入你要修改的類別名稱",text);
    if(name!=null){
        $.post("./api/save_type.php",{name,id},()=>{
            //location.reload();
            $(dom).parent().prev().text(name)
        })
    }
}
</script>

<h2 class="ct">商品管理</h2>
<div class="ct"><button onclick="location.href='?do=add_goods'">新增商品</button></div>
<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php
    $rows=$Goods->all();
    foreach($rows as $row){
    ?>
    <tr class="pp ct">
        <td><?=$row['no'];?></td>
        <td><?=$row['name'];?></td>
        <td><?=$row['stock'];?></td>
        <td><?=($row['sh']==1)?"販售中":"已下架";?></td>
        <td>
            <button onclick="location.href='?do=edit_goods&id=<?=$row['id'];?>'">修改</button>
            <button onclick="del('Goods',<?=$row['id'];?>)">刪除</button>
            <button onclick="sw(<?=$row['id'];?>,1)">上架</button>
            <button onclick="sw(<?=$row['id'];?>,0)">下架</button>
        </td>
    </tr>
    <?php
    }
    ?>    
</table>
<script>
function sw(id,sh){
    $.post("./api/sw.php",{id,sh},()=>{
        location.reload();
    })
}
</script>