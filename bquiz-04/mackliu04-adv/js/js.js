// JavaScript Document
function lof(x)
{
	location.href=x
}

function login(table){
	let user={
		acc:$("#acc").val(),
		pw:$("#pw").val()
	}
	let ans=$("#ans").val();

	$.get("./api/ans.php",{ans},(res)=>{
		if(parseInt(res)){
			$.post("./api/login.php",{table,user},(res)=>{
				if(parseInt(res)){
					switch(table){
						case "User":
							location.href="index.php";
						break;
						case "Admin":
							location.href="backend.php";
						break;
					}
				}else{
					alert("帳號或密碼錯誤")
				}
			})
		}else{
			alert("對不起，您輸入的驗證碼有誤請您重新登入")
		}
	})
}

function del(table,id){
	$.post("./api/del.php",{table,id},()=>{
		location.reload()
	})
}