<!-- 從api/get_list.php複製整段程式碼過來修改 -->
<?php
include_once "../base.php";
$post=$News->find($_GET['id']);
echo "<span style='font-weight:bolder'>".$post['title']."</span>";
echo "<br>";
echo nl2br($post['text']);