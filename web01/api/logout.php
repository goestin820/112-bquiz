<?php
include_once "../base.php";

// session_start();

unset($_SESSION['login']);

to("../index.php?do=login");