<fieldset>
    <legend>會員登入</legend>
    <table>
        <tr>
            <td>帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>
            <!-- 登入和清除功能，都不透過form表單，要自行撰寫js程式來完成 -->
                <!-- <input type="submit" value="登入"> -->
                <input type="button" value="登入" onclick="login()">
                <!-- <input type="reset" value="清除" > -->
                <input type="button" value="清除" onclick="clean()">
            </td>
            <td>
                <a href="?do=forgot">忘記密碼</a>
                <a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function login() {
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val()
        }
        $.post("./api/chk_acc.php", user, (res) => {
            // console.log(res);
            switch (parseInt(res)) {
                case 0:
                    alert('查無帳號')
                    break;
                case 1:
                    if (user.acc == 'admin') {
                        location.href = 'backend.php';
                    } else {
                        location.href = 'index.php';
                    }
                    break;
                case 2:
                    alert('密碼錯誤')
                    break;
            }
        })
    }
</script>

<!-- 將下列程式碼移至js.js統一做判斷
    function clean() {
        // $("#acc,#pw,pw2,#email").val();
        $("input[type='text'],input[type='password'],input[type='number'],input[type='radio']").val("");
    } -->