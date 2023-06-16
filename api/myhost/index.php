<?php

require '../../db/db.php';

error_reporting(0);
header("Access-Control-Allow-Origin:*");

$api_id = 6;
updateAllApiRequestTimes();
updateApiRequestTimes($api_id);

echo $_SERVER['REMOTE_HOST'];
