請輸入信箱以查詢密碼
<input type="email" name="email" id="email">
<div id="result"></div>
<button onclick="find()">尋找</button>
<!-- <input type="button" onclick="find()" value="尋找"> -->

<script>
    function find(){
        $.get("./api/find.php",{email:$("#email").val()},(res)=>{
            // $("#result").html(res);
            $("#result").text(res);
        })
    }
</script>