<?php
/**
 * @Author: zhong
 * @Date: 2023-06-19 17-42-24
 * @LastEditors: zhong
 */

error_reporting(0);
date_default_timezone_set("Asia/Shanghai");
header("Access-Control-Allow-Origin:*");
header("Content-type:application/json; charset=utf-8");


require_once '../../vendor/autoload.php';
require_once '../../core/ip/query.php';
require_once '../../db/db.php';


$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
if ($REQUEST_METHOD === "GET" || $REQUEST_METHOD === "POST") {
    $ip = $_SERVER['REMOTE_ADDR'];
    echo queryIpv4($ip);
} else {
    echo json_encode(array('success' => false, "message" => 'No POST or GET method'), true);
}
