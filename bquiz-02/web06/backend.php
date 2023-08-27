<?php include_once "base.php" ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>健康促進網</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <div id="alerr" style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;">
        <pre id="ssaa"></pre>
    </div>
    <!-- <iframe name="back" style="display:none;"></iframe> -->
    <div id="all">
        <div id="title">
            <?= date("m 月 d 號 l"); ?> | 今日瀏覽: <?= $Viewer->todayViewer(); ?> | 累積瀏覽: <?= $Viewer->totalViewer(); ?>
            <a href='index.php' style='float:right'>回首頁</a>
        </div>
        <div id="title2">
            <a href="index.php">
                <img src="./icon/02B01.jpg" title="健康促進網-回首頁">
            </a>
        </div>
        <div id="mm">
            <div class="hal" id="lef">
                <a class="blo" href="?do=user">帳號管理</a>
                <a class="blo" href="?do=po">分類網誌</a>
                <a class="blo" href="?do=news">最新文章管理</a>
                <a class="blo" href="?do=know">講座管理</a>
                <a class="blo" href="?do=que">問卷管理</a>
            </div>
            <div class="hal" id="main">
                <div style="display:flex">
                    <marquee style="width:75%">請民眾踴躍參加OOOOO</marquee>
                    <span style="width:25%; display:inline-block;">
                        <?php
                        // 判斷是否有'user'的session
                        if (isset($_SESSION['user'])) {
                        ?>
                            歡迎，<?= $_SESSION['user']; ?>
                            <?php
                            if ($_SESSION['user'] == 'admin') {
                                // echo "<button onclick='location.href=&#39;backend.php&#39;'>";
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
                <div class=""> 
                    <?php
                    $do = $_GET['do'] ?? 'main';
                    $table = ucfirst($do);
                    $file = "./view/backend/" . $do . ".php";
                    // if (file_exists($file)) {
                    //     include $file;
                    if(file_exists($file) && $do!='main'){
						// include $file;
						$$table->backend();
                    } else {
                        include "./view/backend/main.php";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div id="bottom">
        本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2023健康促進網社群平台 All Right Reserved
        <br>
        服務信箱：health@test.labor.gov.tw<img src="./icon/02B02.jpg" width="45">
    </div>
    </div>

</body>

</html>