<!-- .ct為此題的置中對齊class -->
<div class="ct">預告片清單</div>
<div style="display:flex;justify-content:space-between;text-align:center">
    <div style="width:22%;background:#999">預告片海報</div>
    <div style="width:22%;background:#999">預告片片名</div>
    <div style="width:22%;background:#999">預告片排序</div>
    <div style="width:32%;background:#999">操作</div>
</div>
<form action="./api/edit_posters.php" method="post">
    <div style="overflow:auto;height:200px;">

        <?php
        // $rows=[0=>[rank=1,id=3],1=>[rank=2,id=6],2=>[rank=4,id=1],3=>[rank=3,id=5]];
        foreach ($rows as $idx => $row) {
            $prev = ($idx == 0) ? $row['id'] : $rows[$idx - 1]['id'];
            /*
            if($idx==0){
            $prev=$row['id'];
            }else{
            $prev=$rows[$idx-1]['id'];
            }
            */
            $next = ($idx == array_key_last($rows)) ? $row['id'] : $rows[$idx + 1]['id'];
            /*
            if($idx==array_key_last($rows)){
            $next=$row['id'];
            }else{
            $next=$rows[$idx+1]['id'];
            } 
            */
        ?>
            <div style="background:white;margin:1px 0 ;width:100%;display:flex;justify-content:space-between;text-align:center;padding:5px 0;align-items:center;">
                <div style="width:22%">
                    <img src="./upload/<?= $row['img']; ?>" style="width:60px;height:80px;">
                </div>
                <div style="width:22%">
                    <input type="text" name="name[]" value="<?= $row['name']; ?>">
                </div>
                <div style="width:22%">
                    <input type="button" class="sw" data-sw="<?= $row['id']; ?>-<?= $prev; ?>" value="往上">
                    <input type="button" class="sw" data-sw="<?= $row['id']; ?>-<?= $next; ?>" value="往下">
                </div>
                <div style="width:32%;color:black">
                    <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>顯示
                    <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">刪除
                    <select name="ani[]">
                        <option value="1" <?= ($row['ani'] == 1) ? "selected" : ''; ?>>淡入淡出</option>
                        <option value="2" <?= ($row['ani'] == 2) ? "selected" : ''; ?>>縮放</option>
                        <option value="3" <?= ($row['ani'] == 3) ? "selected" : ''; ?>>滑入滑出</option>
                    </select>
                    <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="ct">
        <input type="submit" value="編輯確定"><input type="reset" value="重置">
    </div>
</form>

<hr>
<div class="ct">新增預告片海報</div>
<form action="./api/add_poster.php" method="post" enctype="multipart/form-data">
    <div>
        預告片海報: <input type="file" name="img" id="">
        預告片片名: <input type="text" name="name" id="">
    </div>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>

<script>
    $(".sw").on("click",function(){
    let id=$(this).data('sw').split("-")
            // 將poster改為Poster
    $.post("./api/sw.php",{table:'Poster',id},()=>{
        location.reload();
        })
})
</script>