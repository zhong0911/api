<?php
/**
 *
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
    $params = ($REQUEST_METHOD === "GET") ? $_GET : $_POST;
    $ip = $params['ip'] ?? $params['ipv4'] ?? '';
    $result = null;
    if ($ip !== '') {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $result = queryIpv4($ip);
        } else {
            $result = json_encode(
                array('success' => false,
                    'message' => 'IPv4 format error'
                ), true
            );
        }
    } else {
        $result = json_encode(
            array('success' => false,
                'message' => 'IPv4 cannot be empty'
            ), true
        );
    }
    echo $result;
    addIPv4RequestRecord($_SERVER['REMOTE_ADDR'], json_encode($params, true), $result, date('Y-m-d H:i:s'));
} else {
    $result = json_encode(array('success' => false, "message" => 'No POST or GET method'), true);
    echo $result;
    addIPv4RequestRecord($_SERVER['REMOTE_ADDR'], '', $result, date('Y-m-d H:i:s'));
}

