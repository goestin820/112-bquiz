<?php

include_once "../base.php";

// 清除購物車的SESSION資料
unset($_SESSION['cart'][$_POST['id']]);

