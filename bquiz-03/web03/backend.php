<?php
include_once "base.php";

/*撰寫表單的驗證程式,如果驗證成功則建立session來代表登入成功，
如果失敗則建立一個錯誤訊息變數供 login.php 使用*/
if(!empty($_POST)){
  if($_POST['acc']=='admin' && $_POST['pw']=="1234"){
    $_SESSION['login']=1;
  }else{
    $error="帳號或密碼錯誤";
  }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0055)?do=admin -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>影城</title>
  <!-- <link rel="stylesheet" href="css/css.css">
  <link href="Manage Page_files/s2.css" rel="stylesheet" type="text/css">
  <script src="scripts/jquery-1.9.1.min.js"></script> -->
  <link rel="stylesheet" href="./css/css.css">
  <link href="./css/s2.css" rel="stylesheet" type="text/css">
  <script src="./js/jquery-1.9.1.min.js"></script>
</head>

<body>
  <div id="main">
    <div id="top" style=" background:#999 center; background-size:cover; " title="替代文字">
      <h1>ABC影城</h1>
    </div>
    <div id="top2">
      <!-- <a href="03P01.htm">首頁</a> -->
      <a href="index.php">首頁</a>
      <!-- <a href="03P02.htm">線上訂票</a> -->
      <a href="index.php?do=order">線上訂票</a>
      <a href="#">會員系統</a> 
      <!-- <a href="03P03.htm">管理系統</a> -->
      <a href="backend.php">管理系統</a>
    </div>

    <div id="text"> <span class="ct">最新活動</span>
      <marquee direction="right">
        ABC影城票價全面八折優惠1個月
      </marquee>
    </div>
    <div id="mm">

    <!-- 運用isset()去判斷是否login的SESSION是否存在 -->
    <?php
      if(isset($_SESSION['login'])){
    ?>

      <div class="ct a rb" style="position:relative; width:101.5%; left:-1%; padding:3px; top:-9px;">
      <!-- <a href="?do=admin&redo=tit">網站標題管理</a>| 
      <a href="?do=admin&redo=go">動態文字管理</a>| 
      <a href="?do=admin&redo=rr">預告片海報管理</a>| 
      <a href="?do=admin&redo=vv">院線片管理</a>| 
      <a href="?do=admin&redo=order">電影訂票管理</a>  -->
        <a href="?do=tit">網站標題管理</a>|
        <a href="?do=go">動態文字管理</a>|
        <!-- <a href="?do=rr">預告片海報管理</a>| -->
        <a href="?do=poster">預告片海報管理</a>|
        <!-- <a href="?do=vv">院線片管理</a>| -->
        <a href="?do=movie">院線片管理</a>|
        <!-- <a href="?do=">電影訂票管理</a> -->
        <a href="?do=order">電影訂票管理</a>
      </div>

      <?php } ?>

      <div class="rb tab">
        <!-- 將下列這行程式碼剪下貼上至view/backend/main.php -->
        <!-- <h2 class="ct">請選擇所需功能</h2> -->

        <?php
        $do = $_GET['do'] ?? 'main';
        $file = "./view/backend/{$do}.php";
        $table = ucfirst($do);

        if (isset($$table)) {
          $$table->backend();
        } else if (file_exists($file)) {
          include $file;
        } else {
          include "./view/backend/main.php";
        }
        ?>
      </div>
    </div>
    <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
  </div>
</body>

</html>