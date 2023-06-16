<?php

$get = $_GET['s'];
$url = 'https://api.vvhan.com/api/ip?s=' . $get;
header('location:' . $url);

