<div style="color:red">
    <!-- <= (isset($error)) ?? '' ?>; isset的if-else可以縮減為下列程式碼-->
    <?=$error??"";?>
</div>

<form action="?" method="post">
    <p>帳號: <input type="text" name="acc" id="acc"></p>
    <p>密碼: <input type="password" name="pw" id="pw"></p>
    <p><input type="submit" value="登入"></p>
</form>