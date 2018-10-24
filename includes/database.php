<?php

ob_start();
session_start();

defined("DB_HOST") ? null : define("DB_HOST", "localhost");
defined("DB_USER") ? null : define("DB_USER", "root");
defined("DB_PASS") ? null : define("DB_PASS", "root");
defined("DB_NAME") ? null : define("DB_NAME", "fishstall");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//if (!$connection){
//
//    echo "fail";
//}
//else{
//    echo "success";
//}
