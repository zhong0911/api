<?php

header('Access-Control-Allow-Origin:*');
header("Content-Type:text/html;charset=UTF-8");
date_default_timezone_set("PRC");
$qq = $_GET['qq'];
$result = file_get_contents("https://api.vvhan.com/api/qqcode?qq=" . $qq);
echo $result;
