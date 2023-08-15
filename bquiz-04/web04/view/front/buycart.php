<?php

if(!isset($_SESSION['user'])){
    to("?do=login");
}

