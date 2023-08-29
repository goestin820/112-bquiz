<?php include_once "base.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0057)?do=admin -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>┌精品電子商務網站」</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-3.4.1.min.js"></script>
	<script src="./js/js.js"></script>
</head>

<body>
	<div id="main">
		<div id="top">
			<a href="index.php">
				<img src="./icon/0416.jpg">
			</a>
			<img src="./icon/0417.jpg">
		</div>
		<div id="left" class="ct">
			<div style="min-height:400px;">
			<a href="?do=admin">管理權限設置</a>
			<?php 
				echo in_array(1,$Admin->pr())?"<a href='?do=th'>商品分類與管理</a>":"";
				echo in_array(2,$Admin->pr())?"<a href='?do=order'>訂單管理</a>":"";
				echo in_array(3,$Admin->pr())?"<a href='?do=user'>會員管理</a>":"";
				echo in_array(4,$Admin->pr())?"<a href='?do=bot'>頁尾版權管理</a>":"";
				echo in_array(5,$Admin->pr())?"<a href='?do=news'>最新消息管理</a>":"";
			?>
				<a href="./api/logout.php?do=admin" style="color:#f00;">登出</a>
			</div>
		</div>
		<div id="right">
        <?php
            $do=$_GET['do']??'admin';
            $table=ucfirst($do);
            $file="./view/backend/{$do}.php";

            if(isset($$table)){
                $$table->backend();
            }else if(file_exists($file)){
                include $file;
            }else{
                include "./view/backend/admin.php";
            }
        ?>  			
		</div>
		<div id="bottom" style="line-height:70px; color:#FFF; background:url(icon/bot.png);" class="ct">
		<?=$Bottom->bot();?></div>
	</div>

</body>

</html>