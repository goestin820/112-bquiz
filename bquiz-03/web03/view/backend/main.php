<?php
if(isset($_SESSION['login'])){
?>

<h2 class="ct">請選擇所需功能</h2>

<?php
}else{
include "./view/backend/login.php";
}
?>
