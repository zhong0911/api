<?php
error_reporting(0);
header("Access-Control-Allow-Origin:*");
header("Content-type:application/json; charset=utf-8");
date_default_timezone_set("Asia/Shanghai");
$s = isset($_GET['s']) ? htmlspecialchars($_GET['s']) : '';
$m = isset($_GET['m']) ? htmlspecialchars($_GET['m']) : '';
if ($s !== "" && $m === "") {
    $md5 = hash("md5", $s);
    $sha1 = hash("sha1", $s);
    $sha256 = hash("sha256", $s);
    $sha384 = hash("sha384", $s);
    $sha512 = hash("sha512", $s);
    $json = array(
        "string" => $s,
        "success" => true,
        "md5" => $md5,
        "sha1" => $sha1,
        "sha256" => $sha256,
        "sha384" => $sha384,
        "sha512" => $sha512
    );
} elseif ($s !== "" && $m !== "") {
    $hash = hash($m, $s);
    $json = array(
        "string" => $s,
        "success" => true,
        "$m" => $hash,

    );
} else {
    $json = array(
        "string" => $s,
        "success" => false,
        "message" => "The string is null"
    );
}
echo json_encode($json, JSON_UNESCAPED_UNICODE);

