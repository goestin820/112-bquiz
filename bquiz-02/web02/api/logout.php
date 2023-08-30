<?php
// session_start();
include_once "../base.php";

unset($_SESSION['user']);

header("location:../index.php");