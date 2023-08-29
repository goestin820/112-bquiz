<h2 class="ct">會員註冊</h2>
<form action="#">
    <table class="all">
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp">
                <input type="text" name="acc" id="acc">
                <input type="button" value="檢測帳號" onclick="chkAcc()">
            </td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp"><input type="text" name="tel" id="tel"></td>
        </tr>
        <tr>
            <td class="tt ct">住址</td>
            <td class="pp"><input type="text" name="addr" id="addr"></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><input type="text" name="email" id="email"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="regdate" id="regdate" value="<?=date("Y-m-d");?>">
        <input type="button" value="註冊" onclick="reg()">
        <input type="reset" value="重置">
    </div>
</form>
<script>
function chkAcc(){
    $.get("./api/chk_acc.php",{acc:$("#acc").val()},(res)=>{
        if(parseInt(res)==1 || $("#acc").val()=='admin'){
            alert("此帳號已被使用");
        }else{
            alert("此帳號可使用");
        }
    })
}


function reg(){
    let user={};
    user.name=$("#name").val();
    user.acc=$("#acc").val();
    user.pw=$("#pw").val();
    user.tel=$("#tel").val();
    user.addr=$("#addr").val();
    user.email=$("#email").val();
    user.regdate=$("#regdate").val();

    $.get("./api/chk_acc.php",{acc:user.acc},(res)=>{
        if(parseInt(res)==1 || $("#acc").val()=='admin'){
            alert("此帳號已被使用");
        }else{
            $.post("./api/reg.php",user,()=>{
                alert("註冊成功，歡迎加入")
                location.href="?do=login";
            })
        }
    })
}
</script>