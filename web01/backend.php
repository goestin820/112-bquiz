﻿<?php include_once "base.php"; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0068)?do=admin&redo=title -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>卓越科技大學校園資訊系統</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>
</head>

<body>
	<div id="cover" style="display:none; ">
		<div id="coverr">
			<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
			<div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
		</div>
	</div>
	<!-- <iframe style="display:none;" name="back" id="back"></iframe> 將iframe標籤刪除-->
	<div id="main">
		<!-- <a title="" href="?"> -->
		<a title="<?=$Title->title;?>" href="?">
			<!-- <div class="ti" style="background:url(&#39;use/&#39;); background-size:cover;"></div>標題 -->
			<div class="ti" style="background:url('./upload/<?=$Title->img;?>'); background-size:cover;"></div>
		</a>
		<div id="ms">
			<div id="lf" style="float:left;">
				<div id="menuput" class="dbor">
					<!--主選單放此-->
					<span class="t botli">後台管理選單</span>
					<!-- <a style="color:#000; font-size:13px; text-decoration:none;" href="./Management page_files/Management page.htm"> -->
					<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=title">
						<div class="mainmu">網站標題管理</div>
					</a>
					<!-- <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=ad"> -->
					<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=ad">
						<div class="mainmu">動態文字廣告管理</div>				
					</a>
					<!-- <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=mvim"> -->
					<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=mvim">
						<div class="mainmu">動畫圖片管理</div>
					</a>
					<!-- <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=image"> -->
					<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=image">
						<div class="mainmu">校園映像資料管理</div>
					</a>
					<!-- <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=total"> -->
					<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=total">
						<div class="mainmu">進站總人數管理</div>
					</a>
					<!-- <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=bottom"> -->
					<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=bottom">
						<div class="mainmu">頁尾版權資料管理</div>
					</a>
					<!-- <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=news"> -->
					<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=news">
						<div class="mainmu">最新消息資料管理</div>
					</a>
					<!-- <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=admin"> -->
					<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin">
						<div class="mainmu">管理者帳號管理</div>
					</a>
					<!-- <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=menu"> -->
					<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=menu">
						<div class="mainmu">選單管理</div>
					</a>
				</div>
				
				<div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
					<!-- <span class="t">進站總人數 :<= $Total->find(1)['total']; ?> </span> -->
					<span class="t">進站總人數 :<?=$Total->show();?> </span>
				</div>
			</div>
			
			<div class="di" style="height:540px; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
				<!--正中央-->
				<table width="100%">
					<tbody>
						<tr>
							<td style="width:70%;font-weight:800; border:#333 1px solid; border-radius:3px;" class="cent"><a href="?do=admin" style="color:#000; text-decoration:none;">後台管理區</a></td>
							<!-- <td><button onclick="document.cookie=&#39;user=&#39;;location.replace(&#39;?&#39;)" style="width:99%; margin-right:2px; height:50px;">管理登出</button></td> -->
							<!-- <td><button onclick="location.replace('index.php?do=login')" style="width:99%; margin-right:2px; height:50px;">管理登出</button></td>							 -->
							<td><button onclick="location.replace('index.php?do=login')" style="width:99%; margin-right:2px; height:50px;">管理登出</button></td>
						</tr>
					</tbody>
				</table>

				<!-- include "./back/title.php"  -->

				<?php

				$do = $_GET['do'] ?? 'title'; //使用三元運算式來取得網址的GET參數
				$table = ucfirst($do);

				$$table->list();
				// $file = "./back/" . $do . ".php"; //建立檔案路徑及檔名



				// $header=['title'=>'網站標題管理'];

				// switch ($do) {
				// 	case 'title':
				// 		$header='網站標題管理';
				// 		break;
				// 	case 'ad':
				// 		$header='動態文字廣告管理';
				// 		break;
				// 	case 'mvim':
				// 		$header='動態文字廣告管理';
				// 		break;
				// }

				//判斷檔案是否存在,存在則載入,不存在則載入main.php
				// if (file_exists($file)) {
				// 	include $file;
				// } else {
				// 	include "./back/title.php";
				// }
				?>
				<!-- <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<p class="t cent botli">網站標題管理</p>
					<form method="post" target="back" action="?do=tii">
						<table width="100%">
							<tbody>
								<tr class="yel">
									<td width="45%">網站標題</td>
									<td width="23%">替代文字</td>
									<td width="7%">顯示</td>
									<td width="7%">刪除</td>
									<td></td>
								</tr>
							</tbody>
						</table>
						<table style="margin-top:40px; width:70%;">
							<tbody>
								<tr>
									<td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=title&#39;)" value="新增網站標題圖片"></td>
									<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
								</tr>
							</tbody>
						</table>

					</form>
				</div> -->
			</div>

			<!-- 這段程式碼前台最新消息區，請整段剪下貼上至/front/news.php？ 不確定-->
			<!-- 此段程式碼已經整合至main.php，故可以刪除 -->
			<!-- <div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div> -->
			<!-- <script>
				$(".sswww").hover(
					function() {
						$("#alt").html("" + $(this).children(".all").html() + "").css({
							"top": $(this).offset().top - 50
						})
						$("#alt").show()
					}
				)
				$(".sswww").mouseout(
					function() {
						$("#alt").hide()
					}
				)
			</script> -->
		</div>
		<div style="clear:both;"></div>
		<div style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
			<span class="t" style="line-height:123px;">
				<!-- <= $Bottom->find(1)['bottom']; ?> -->
				<?=$Bottom->show();?>		
			</span>
		</div>
	</div>

</body>

</html>