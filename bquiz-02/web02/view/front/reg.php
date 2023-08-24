<fieldset>
    <legend>會員註冊</legend>
    <div style="color:red">
        *請設定您要註冊的帳號及密碼(最長12個字元)
    </div>
    <table>
        <tr>
            <td class="clo">Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <button onclick="reg()">註冊</button>
                <button onclick="clean()">清除</button>
            </td>
            <td></td>
        </tr>
    </table>
</fieldset>

<script>
    function reg() {
        //宣告一個物件用來存放表單目前被填入的資料
        let info = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val(),
        }

        //先檢查是否有任何一個欄位是空白的
        if (info.acc == '' || info.pw == '' || info.pw2 == '' || info.email == '') {
            alert("不可空白");
        //接著檢查兩個密碼欄位內容是否一致
        } else if (info.pw != info.pw2) {
            alert("密碼錯誤");
        } else {
            //假如上述2個判斷式都不符合的話，就將帳號acc送去後端chk_acc.php進行檢查
            $.post("./api/chk_acc.php", {
                acc: info.acc
            }, (res) => {
                //假如回傳的結果不是0,表示此帳號在資料表中已存在
                if (parseInt(res) !== 0) {
                    alert("帳號重複");
                } else {
                    //如果回傳的結果是0,表示資料表中沒有這個帳號,將表單資料送到後端reg.php中進行更新
                    $.post("./api/reg.php", info, () => {
                        alert("註冊完成，歡迎加入")
                    })
                }
            })
        }
    }
</script>