<?php
/**
 * @Author: zhong
 * @Date: 2021-10-26 10:12:07
 * @LastEditors: zhong
 * @LastEditTime: 2022-02-16 13:24:53
 */

error_reporting(0);
header("Access-Control-Allow-Origin:*");
header("Content-type:application/json; charset=utf-8");

require_once '../../db/db.php';
require '../../libs/phpqrcode/phpqrcode.php';

$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
if ($REQUEST_METHOD === "GET" || $REQUEST_METHOD === "POST") {
    $params = ($REQUEST_METHOD === "GET") ? $_GET : $_POST;
    $text = $params['text'] ?? '';
    $size = $params['size'] ?? 8;
    $margin = $params['margin'] ?? 1;
    if ($text !== "") {
        QRcode::png($text, $outfile = false, $level = QR_ECLEVEL_L, $size, $margin, $saveandprint = false);
    } else {
        echo "{\"success\": false, \"message\": \"Text cannot br empty\"}";
    }
    addQRCodeRequestRecord($_SERVER['REMOTE_ADDR'], json_encode($params, true), date('Y-m-d H:i:s'));
} else {
    $result= json_encode(array('success' => false, "message" => 'No POST or GET method'), true);
    echo $result;
    addIPv4RequestRecord($_SERVER['REMOTE_ADDR'], '', $result, date('Y-m-d H:i:s'));
}
