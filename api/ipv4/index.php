<?php
/**
 *
 */
error_reporting(0);
header("Access-Control-Allow-Origin:*");
header("Content-type:application/json; charset=utf-8");
date_default_timezone_set("Asia/Shanghai");


require '../../vendor/autoload.php';
require '../../core/ip/query.php';
require '../../db/db.php';


$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
if ($REQUEST_METHOD === "GET" || $REQUEST_METHOD === "POST") {
    $params = ($REQUEST_METHOD === "GET") ? $_GET : $_POST;
    $ip = $params['ip'] ?? $params['ipv4'] ?? '';
    if ($ip) {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            echo queryIpv4($ip);
        } else {
            echo json_encode(
                array('success' => false,
                    'message' => 'IPv4 format error'
                ), true
            );
        }
    } else {
        echo json_encode(
            array('success' => false,
                'message' => 'IPv4 cannot be empty'
            ), true
        );
    }
    $api_id = 7;
    updateAllApiRequestTimes();
    updateApiRequestTimes($api_id);
} else {
    echo json_encode(array('success' => false, "message" => 'No POST or GET method'), true);
}