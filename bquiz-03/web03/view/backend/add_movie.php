<h3 class="ct">新增院線片</h3>
<form action="./api/add_movie.php" method="post" enctype="multipart/form-data">
<div style="display:flex">
    <div>影片資料</div>
    <div>
        <div>
            <label for="">片名:</label>
            <input type="text" name="name" value="">
        </div>
        <div>
            <label for="">分級:</label>
            <select name="level" value="">
                <option value="1">普遍級</option>
                <option value="2">輔導級</option>
                <option value="3">保護級</option>
                <option value="4">限制級</option>
            </select>
        </div>
        <div>
            <label for="">片長:</label>
            <input type="text" name="length" value="">
        </div>
        <div>
            <label for="">上映日期:</label>
            <select name="year" value="">
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
            </select>年
            <select name="month" value="">
                <?php 
                    for($i=1;$i<=12;$i++){
                        echo "<option value='$i'>$i</option>";
                    }
                ?>             
            </select>月
            <select name="day" value="">
            <?php 
                    for($i=1;$i<=31;$i++){
                        echo "<option value='$i'>$i</option>";
                    }
                ?>
            </select>日
        </div>
        <div>
            <label for="">發行商:</label>
            <input type="text" name="publish" value="">
        </div>
        <div>
            <label for="">導演:</label>
            <input type="text" name="director" value="">
        </div>
        <div>
            <label for="">預告影片:</label>
            <input type="file" name="trailer" value="">
        </div>
        <div>
            <label for="">電影海報:</label>
            <input type="file" name="poster" value="">
        </div>
    </div>
</div>

<div style="display:flex">
    <div>劇情簡介</div>
    <div><textarea name="intro" id="" style="width:98%;height:60px"></textarea></div>
</div>
<hr>

<div class="ct">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</div>

</form>