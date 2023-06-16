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

require '../../db/db.php';
require '../../libs/phpqrcode/phpqrcode.php';

$api_id = 3;
updateAllApiRequestTimes();
updateApiRequestTimes($api_id);

$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
if ($REQUEST_METHOD === "GET" || $REQUEST_METHOD === "POST") {
    $params = ($REQUEST_METHOD === "GET") ? $_GET : $_POST;
    $text = $params['text'] ?? '';
    $size = $params['size'] ?? 8;
    $margin = $params['margin'] ?? 1;
    if ($text !== "") {
        QRcode::png($text, $outfile = false, $level = QR_ECLEVEL_L, $size , $margin, $saveandprint = false);
    } else {
        echo "{\"success\": false, \"message\": \"Text cannot br empty\"}";
    }

} else {
    echo json_encode(array('success' => false, "message" => 'No POST or GET method'), true);
}
