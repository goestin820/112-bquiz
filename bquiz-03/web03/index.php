<?php include_once "base.php";?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0047)? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>影城</title>
  <!-- 修正以下3行程式碼的CSS和JS連結 -->
  <link rel="stylesheet" href="./css/css.css">
  <link href="./css/s2.css" rel="stylesheet" type="text/css">
  <script src="./js/jquery-1.9.1.min.js"></script>
</head>

<body>
  <div id="main">
    <div id="top" class="ct" style=" background:#999 center; background-size:cover; " title="替代文字">
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
      <!-- 將以下程式碼剪下貼上至/view/front/main.php -->
      <!-- <div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
          <ul class="lists">
          </ul>
          <ul class="controls">
          </ul>
        </div>
      </div>
    </div>
    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;">
        <table>
          <tbody>
            <tr> </tr>
          </tbody>
        </table>
        <div class="ct"> </div>
      </div>
    </div> -->

      <!-- 複製此段PHP程式碼至backend.php再修改 -->
      <?php
      $do = $_GET['do'] ?? 'main';
      $file = "./view/front/{$do}.php";
      $table = ucfirst($do);

      if (isset($$table)) {
        $$table->front();
      } else if (file_exists($file)) {
        include $file;
      } else {
        include "./view/front/main.php";
      }
      ?>
    </div>
    
    <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
  </div>
</body>

</html>