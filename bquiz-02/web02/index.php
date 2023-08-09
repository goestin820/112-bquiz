﻿<?php include_once "base.php"; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>健康促進網</title>
	<!-- <link href="./home_files/css.css" rel="stylesheet" type="text/css"> -->
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<!-- <script src="./home_files/jquery-1.9.1.min.js"></script> -->
	<script src="./js/jquery-1.9.1.min.js"></script>
	<!-- <script src="./home_files/js.js"></script> -->
	<script src="./js/js.js"></script>
	<style>
		/* .all {
			background: rgba(51, 51, 51, 0.8);
			color: #FFF;
			min-height: 100px;
			width: 300px;
			position: fixed;
			display: none;
			z-index: 9999;
			overflow: auto;
			padding: 15px;
    		border-radius: 10px;
    		box-shadow: 2px 2px 10px #999;
    		height: 400px;			
		} */
	</style>
</head>

<body>
	<div id="alerr" style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;">
		<pre id="ssaa"></pre>
	</div>

	<!-- 將整段iframe程式碼刪除 -->
	<!-- <iframe name="back" style="display:none;"></iframe> -->

	<div id="all">
		<div id="title">
			<!-- 00 月 00 號 Tuesday | 今日瀏覽: 1 | 累積瀏覽: 36 </div> -->
			<?= date("m 月 d 號 l"); ?> | 今日瀏覽:<?= $Viewer->todayViewer(); ?> | 累積瀏覽: <?= $Viewer->totalViewer(); ?>
			<a href='index.php' style='float:right'>回首頁</a>
		</div>
		<div id="title2">
			<!-- 新增圖片網址 -->
			<a href='index.php'><img src="./icon/02B01.jpg" title="健康促進網-回首頁"></a>
		</div>
		<div id="mm">
			<div class="hal" id="lef">
				<a class="blo" href="?do=po">分類網誌</a>
				<a class="blo" href="?do=news">最新文章</a>
				<a class="blo" href="?do=pop">人氣文章</a>
				<a class="blo" href="?do=know">講座訊息</a>
				<a class="blo" href="?do=que">問卷調查</a>
			</div>
			<div class="hal" id="main">
				<div style="display:flex">
					<!-- 新增跑馬燈畫面，並將width寬度設定為75%-->
					<marquee style="width:75%">請民眾踴躍投稿電子報，讓電子報成為大家相互交流、分享的園地！詳見最新文章</marquee>

					<!-- <span style="width:18%; display:inline-block;"> 將會員登入width寬度設定為25%-->
					<span style="width:25%; display:inline-block;">
						<?php
						// 判斷是否有'user'的session
						if (isset($_SESSION['user'])) {
						?>
							歡迎，<?= $_SESSION['user']; ?>
							<?php
							if ($_SESSION['user'] == 'admin') {
								echo "<button onclick='location.href=&#39;backend.php&#39;'>";
								echo "<button onclick='location.href=&#39;backend.php&#39;'>";
								echo "管理";
								echo "</button>";
							}
							?>
							<button onclick="location.href='./api/logout.php'">登出</button>
						<?php
						} else {
						?>
							<a href="?do=login">會員登入</a>
						<?php
						}
						?>
					</span>
				</div>
				<!-- 將下列主畫面移至下方，成為一個獨立的div -->
				<div class="">
					<?php
					$do = $_GET['do'] ?? 'main';
					$file = "./view/front/" . $do . ".php";
					if (file_exists($file)) {
						include $file;
					} else {
						include "./view/front/main.php";
					}
					?>
				</div>
			</div>
		</div>
		<div id="bottom">
			<!-- 本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2012健康促進網社群平台 All Right Reserved -->
			本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2023健康促進網社群平台 All Right Reserved
			<br>
			<!-- 服務信箱：health@test.labor.gov.tw<img src="./home_files/02B02.jpg" width="45"> -->
			服務信箱：health@test.labor.gov.tw<img src="./icon/02B02.jpg" width="45">
		</div>
	</div>

</body>

</html>