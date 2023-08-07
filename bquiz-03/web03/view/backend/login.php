<div style="color:red">
    <!--判斷是否有錯誤訊息，如果有錯誤則在畫面上顯示-->
    <!-- <= (isset($error)) ?? '' ?>; isset的if-else可以縮減為下列程式碼-->
    <?= $error ?? ""; ?>
</div>

<!--action="?"為當前頁重新載入-->
<form action="?" method="post">
    <p>帳號: <input type="text" name="acc" id="acc"></p>
    <p>密碼: <input type="password" name="pw" id="pw"></p>
    <p><input type="submit" value="登入"></p>
</form>