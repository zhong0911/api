<?php
error_reporting(0);
header("Access-Control-Allow-Origin:*");
header("Content-type:application/json; charset=utf-8");

$api_id = 3;
updateAllApiRequestTimes();
updateApiRequestTimes($api_id);

$qq = $_GET['qq'];
if ($qq)
    header("Location: tencent://snsapp/?cmd=2&ver=1&uin=$qq&fuin=$qq");
else {
    echo json_encode(
        array(
            'success' => false,
            'message' => 'QQ number cannot be empty'
        ),
        true
    );
}
